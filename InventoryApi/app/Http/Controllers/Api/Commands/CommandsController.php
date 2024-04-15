<?php

namespace App\Http\Controllers\Api\Commands;

use App\Contracts\Commands\CommandsServiceContract;
use App\Models\Command;
use App\Http\Controllers\Controller;
use App\Http\Requests\Commands\CommandStoresRequest;
use App\Http\Requests\Commands\CommandUpdatesRequest;

class CommandsController extends Controller
{

    private $commandsService;

    public function __construct(CommandsServiceContract $commandsService)
    {
        $this->commandsService = $commandsService;
    }

    /**
     * Display a listing of the employees.
     * @return 
     */
    public function index()
    {
        return $this->commandsService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommandStoresRequest $request)
    {
        return  $this->commandsService->create($request->validated());
    }

    /**
     * Display the specified salary.
     * 
     */
    public function show(Command $command)
    {
        return $this->commandsService->show($command);
    }

    /**
     * Update the specified salary in storage.
     */
    public function update(CommandUpdatesRequest $request, Command $command)
    {
        return $this->commandsService->update($command, $request->validated());
    }

    /**
     * Remove the specified salary from storage.
     */
    public function destroy(Command $command)
    {
        return $this->commandsService->delete($command);
    }
}
