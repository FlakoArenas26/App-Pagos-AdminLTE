<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $users = User::all(); // Obtener la lista de usuarios
        $services = Service::all(); // Obtener la lista de servicios

        // Obtener los pagos con los usuarios asociados y los servicios con sus montos
        $payments = Payment::with('user', 'services')->get();

        // Iterate through payments to calculate the total amount for each payment
        foreach ($payments as $payment) {
            $totalAmount = 0;

            // Calculate the total amount for services in this payment
            foreach ($payment->services as $service) {
                $amount = \DB::table('payment_service')
                    ->where('payment_id', $payment->id)
                    ->where('service_id', $service->id)
                    ->value('amount');

                // Accumulate the amount for each service
                $totalAmount += $amount;
            }

            // Assign the total amount to the payment object
            $payment->total_amount = $totalAmount;
        }

        // Return the payments with total amounts to the view
        return view('payments.index', compact('users', 'services', 'payments'));
    }

    public function create()
    {
        $users = User::all();
        $services = Service::all();
        $payments = Payment::all();

        return view('payments.create', compact('users', 'services', 'payments'));
    }

    public function store(Request $request)
    {

        try {

            // Validación
            $this->validate($request, [
                'user_id' => 'required|exists:users,id',
                'services' => 'required|array',
                'services.*' => 'exists:services,id',
                'amount' => 'required|numeric|min:0',
            ]);

            // Transactions para encapsular operación
            \DB::beginTransaction();

            // Obtener usuario
            $user = User::findOrFail($request->user_id);

            // Crear pago
            $payment = Payment::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'date' => now(),
            ]);

            // Sincronizar servicios
            $selectedServices = $request->input('services');
            $payment->services()->sync($selectedServices);

            \DB::commit();

        } catch (\Exception $e) {

            \DB::rollback();

            return back()->withError($e->getMessage());

        }

        // Redireccionar
        return redirect()
            ->route('payments.index')
            ->with('success', 'Pago exitoso');

    }

    public function show($id)
    {
        $payment = Payment::find($id);

        return view('payments.show', compact('payment'));
    }

    public function downloadPDF(Payment $payment)
    {
        // Puedes personalizar esta lógica según la estructura de tu PDF
        $pdf = Pdf::loadView('payments.pdf', compact('payment'));

        // Nombre del archivo PDF (puedes personalizar esto)
        $filename = 'payment_' . $payment->id . '.pdf';

        // Descargar el PDF en el navegador
        return $pdf->download($filename);
    }
}
