<?php

namespace App\Services\Commands;

use App\Models\Command;
use Illuminate\Http\Response;
use App\Http\Resources\Commands\CommandsResource;
use App\Contracts\Commands\CommandsServiceContract;
use App\Http\Resources\Commands\CommandsCollection;

class ExpensesServices implements CommandsServiceContract
{

    /**
     * create an command
     * 
     * @param array $data.
     * @return CommandsResource.
     */
    public function create($data): CommandsResource
    {
        return new CommandsResource(Command::create($data));
    }

    /**
     * update an command
     * 
     * @param Command $command.
     * @return CommandsResource.
     */
    public function update(Command $command, array $data): CommandsResource
    {
        $command->update($data);
        return new CommandsResource($command);
    }


    /**
     * get all products
     * 
     * @return array.
     */

    public function index(): CommandsCollection
    {

        return new CommandsCollection(Command::all());
    }


    /**
     * get an command
     * @param Command $command
     * @return CommandsResource.
     */

    public function show(Command $command): CommandsResource
    {
        return new CommandsResource($command);
    }



    /**
     * delete an command
     * 
     * @param Command $command.
     * @return Illuminate\Http\Response.
     */

    public function delete(Command $command): Response
    {
        $command->delete();

        return response()->noContent();
    }
}
