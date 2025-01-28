<?php

namespace Kinsari\Azticketing;

use Kinsari\Azticketing\Responses\WorkItem;
use Illuminate\Support\Facades\Route;
use AzTicketingManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

Route::group(['middleware' => ['web'], 'prefix' => 'azticketing'], function () {

    Route::get('/', function () {

        $azTickets = AzTicketingManager::getTickets();

        $workItems = $azTickets["workItems"];
        $workItemsWithDetails = [];

        foreach ($workItems as $workItem) {
            $workItemDetails = AzTicketingManager::getTicket($workItem["id"]);
            $workItemsWithDetails[] = WorkItem::fromArray($workItemDetails);
        }

        return view('azticketing::index', ['tickets' => $workItemsWithDetails]);
    });

    Route::post('/workitem/create', function (Request $request) {

        $title = $request->input('title');

        $observations = $request->input('observations') ?? "";
        $exceptionMessage = $request->input('exceptionMessage') ?? "";

        $description = $request->input('description') ?? $observations. "\n\n" . $exceptionMessage;

        $az = AzTicketingManager::createTicket($title, $description, ["System.Tags" => env('APP_NAME')]);

        if ($az) {
            return redirect()->back()->with('success', 'Ticket created');
        } else {
            return redirect()->back()->with('error', 'Error creating ticket');
        }
    })->name('azticketing.create');

    Route::get('/workitem/{id}', function ($id) {

        $ticket = AzTicketingManager::getTicket($id);

        if ($ticket) {
            $workItem = WorkItem::fromArray($ticket);

            return view('azticketing::index', ['ticket' => $workItem])->with('success', 'Ticket created');
        } else {
            return view('azticketing::index', ['error' => 'Error getting ticket'])->with('error', 'Error getting ticket');
        }
    });

    Route::post('/workitem/{id}/addcomment', function ($id, Request $request) {

        $body = $request->input('text');

        $ticket = AzTicketingManager::addComment($id, $body);

        if ($ticket) {
            $workItem = WorkItem::fromArray($ticket);

            return view('azticketing::index', ['ticket' => $workItem])->with('success', 'Comment added');
        } else {
            return view('azticketing::index', ['error' => 'Error adding comment'])->with('error', 'Error adding comment');
        }
    });

    Route::get('/workitem/{id}/close', function ($id) {

        $az = AzTicketingManager::closeTicket($id);

        return view('azticketing::index', ['ticket' => $az]);
    });

    Route::get('/workitem/{id}/close', function ($id) {

        $az = AzTicketingManager::closeTicket($id);

        return view('azticketing::index', ['ticket' => $az]);
    });

    Route::get('/report', function () {

        $exceptionMessage = Session::get('exceptionMessage') ?? null;

        $timestamp = now()->format('Y-m-d H:i:s');
        $exceptionTitle = "Erro Reportado ER $timestamp";

        return view('azticketing::report', compact('exceptionMessage', 'exceptionTitle'));
    });
});
