<?php

namespace App\Http\Controllers;

use App\Models\MedicalAppointment;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\FormMedicalAppointmentRequest;
use App\Notifications\NewEmailNotification;
use Illuminate\Support\Facades\Notification;

class MedicalAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = MedicalAppointment::all();

        return view('pages.medical-appointment.index', [
            'appointments' => $appointments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.medical-appointment.create');
    }

    public function search(Request $request)
    {
        try {
            $filters = $request->only('name', 'email', 'date_start', 'date_end');

            if (isset($filters['date_start'])) {
                $filters['date_start'] = formatDateAndTime($filters['date_start'], 'Y-m-d H:i:s');
            }

            if (isset($filters['date_end'])) {
                $filters['date_end'] = formatDateAndTime($filters['date_end'], 'Y-m-d H:i:s');
            }

            if (isset($filters['date_start']) && isset($filters['date_end'])) {
                if ($filters['date_end'] < $filters['date_start']) {
                    throw new Exception('Data inicial deve ser superior a final.');
                }
            }

            $appointments = MedicalAppointment::search($filters);

            if (isset($filters['date_start'])) {
                $filters['date_start'] = formatDateAndTime($filters['date_start'], 'Y-m-d') . 'T' . formatDateAndTime($filters['date_start'], 'H:i');
            }
            if (isset($filters['date_end'])) {
                $filters['date_end'] = formatDateAndTime($filters['date_end'], 'Y-m-d') . 'T' . formatDateAndTime($filters['date_start'], 'H:i');
            }

            return view('pages.medical-appointment.index', [
                'filters' => $filters,
                'appointments' => $appointments
            ]);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormMedicalAppointmentRequest $request)
    {
        try {
            $data = $request->except('_token');

            $data['date_appointment'] = formatDateAndTime($data['date_appointment'], 'Y-m-d H:i:s');

            if ($data['date_appointment'] < date('Y-m-d H:i:s')) {
                return redirect()->route('apontamentos.create')->with('error', 'Data da consulta deve ser superior a hoje.');
            }

            $appointment = MedicalAppointment::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'date_appointment' => $data['date_appointment'],
                'description' => $data['description'],
            ]);

            Notification::route('mail', $appointment->email)
                ->notify(new NewEmailNotification($appointment));

            return redirect()->route('apontamentos.index')->with('success', 'Sucesso ao salvar.');
        } catch (Exception $ex) {
            // dd($ex->getMessage(), $ex->errorInfo, $ex->getCode());
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = MedicalAppointment::find($id);

        if (!$appointment)
            return redirect()->route('apontamentos.index')->with('error', 'Consulta não encontrada.');

        $appointment['date_appointment'] = formatDateAndTime($appointment['date_appointment'], 'Y-m-d') . 'T' . formatDateAndTime($appointment['date_appointment'], 'H:i');

        return view('pages.medical-appointment.edit', ['appointment' => $appointment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $appointment = MedicalAppointment::find($id);

            if (!$appointment)
                return redirect()->back();

            $dataUpdate = $request->except('_token');

            $appointment->update($dataUpdate);

            return redirect()->route('apontamentos.index')->with('success', 'Alterado com sucesso.');
        } catch (Exception $ex) {
            $error = [
                'message' => 'Ocorreu um erro ao salvar: ' . $ex->getMessage()
            ];
            return redirect()->back()->with('error', $error['message']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $appointment = MedicalAppointment::find($id);

            if (!$appointment)
                return redirect()->back();

            $appointment->delete();

            return response()->json(['success' => true, 'message' => 'Excluido com sucesso.']);
        } catch (Exception $ex) {
            $error = [
                'message' => 'Ocorreu um erro ao salvar: ' . $ex->getMessage()
            ];
            return redirect()->back()->with('error', $error['message']);
        }
    }
}
