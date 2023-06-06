<?php

namespace App\Http\Controllers;

use App\Command\RegisterUserCommand;
use App\Http\Requests\createBookingRequest;
use App\Http\Requests\updateTherapistRequest;
use App\Http\Requests\updateTreatmentRequest;
use App\Models\Appointment;
use App\Models\Company;
use App\Models\Employees;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Therapist;
use App\Models\Treatment;
use App\Models\TreatmentTherapist;
use App\Models\User;
use App\Query\GetCompanyEmployeesQuery;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //getAllTreatments
    function allTreatments(): \Illuminate\Http\JsonResponse
    {
        $treatments = Treatment::all();
        if ($treatments->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'There are no treatments available'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'data' => [
                    'treatments' => $treatments
                ]
            ], 200);
        }

    }

//getTgerapistByTreatment
    function therapistByTreatment($idTreatment): \Illuminate\Http\JsonResponse
    {
        $treatmentTherapist = TreatmentTherapist::where('TreatmentID', $idTreatment)->with('therapists')->with('treatments')->first();
        if (!$treatmentTherapist) {
            return response()->json([
                'success' => false,
                'message' => 'There are no therapist for this treatment'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'data' => $treatmentTherapist ]
            , 200);
        }
    }

    //submitReservation/Booking
    public function submitReservation(
        createBookingRequest $request,
        UserService $userService
    ): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        $command = new RegisterUserCommand(
            $user->UserID,
            $request->DateTime,
            $request->treatmenttherapistID
        );
        $userService->registerUser($command);

        return response()->json([
            'status' => true,
            'message' => 'Reservation created successfully',
        ], 200);

    }

    //getAllReservation
    function allReservation(): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::all();
        if ($reservation->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'There are no reservation'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'data' => [
                    'reservations' => $reservation
                ]
            ], 200);
        }

    }

    //getReservationByID
    function reservationID($id = null): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::find($id);
        if (empty($reservation)) {
            return response()->json([
                'success' => false,
                'message' => 'Reservation does not exist!'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $reservation
                ]
            ], 200);
        }

    }

    //deleteReservationByID
    function deleteReservation($id): \Illuminate\Http\JsonResponse
    {
        $result = Reservation::where('id', $id)->delete();
        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => 'Reservation is not delete'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Reservation is delete.'
            ], 200);
        }
    }

    //getAllTherapist
    function allTherapist(): \Illuminate\Http\JsonResponse
    {
        $therapist = Therapist::all();
        if ($therapist->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'There are no therapists.'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'data' => [
                    'therapists' => $therapist
                ]
            ], 200);
        }

    }

    //updateTreatment
    function updateTreatment(updateTreatmentRequest $req): \Illuminate\Http\JsonResponse
    {
        $treatment = Treatment::find($req->id);
        $treatment->price = $req->price;
        $treatment->Duration = $req->Duration;
        $treatment->Description = $req->Description;
        $result = $treatment->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment has been update successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No update'
            ], 400);
        }
    }

    //updateTherapist
    function updateTherapist(updateTherapistRequest $req): \Illuminate\Http\JsonResponse
    {
        $therapist = Therapist::find($req->id);
        $therapist->SkillTypeID = $req->SkillTypeID;
        $result = $therapist->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Therapist has been updated successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No update'
            ], 400);
        }
    }
    function publicCompanies(): \Illuminate\Http\JsonResponse
    {
        $companies = Company::all();
        if ($companies->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'There are no companies'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'data' => [
                    'companies' => $companies
                ]
            ], 200);
        }

    }

    function employeesByCompany(
        $idCompany,
        UserService $service
    ): \Illuminate\Http\JsonResponse
    {
        $query = new GetCompanyEmployeesQuery($idCompany);
        $employees = $service->getCompanyEmployees($query);


        if ($employees->isEmpty()    === true) {
            return response()->json([
                'success' => false,
                'message' => 'There are no employees in this company'
            ], 400);
        } else {
            return response()->json([
                    'success' => true,
                    'data' => $employees ]
                , 200);
        }
    }
    //getAllService
    function getAllServices(): \Illuminate\Http\JsonResponse
    {
        $service = Service::all();
        if ($service->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'There are no services.'
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'data' => [
                    'service' => $service
                ]
            ], 200);
        }

    }
    //submitAppointment
    public function submitAppointment(createBookingRequest $request): \Illuminate\Http\JsonResponse
    {
        $user=Auth::user();
        $appointment = Appointment::create([
            'PhoneNumber' => $request->PhoneNumber,
            'companyID' => $request->companyID,
            'serviceID' => $request->serviceID,
            'Email'=>$request->Email
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Reservation created successfully',
        ], 200);

    }
}
