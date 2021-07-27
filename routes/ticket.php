<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
//Route::view('/ticket','Ticket.form')->name('Ticket.form');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
//Route::get('/tickets/delete/{ticket}', [TicketController::class, 'destroy']);
Route::patch('/tickets/{id}/status', [TicketController::class, 'update_status'])->name('ticket.update.status');
Route::patch('/tickets/{id}/reply', [TicketController::class, 'sendReply'])->name('ticket.sendReply');
//Route::any('/ticket/store', [TicketController::class, 'store'])->name('Ticket.receiveForm');