<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use App\Repositories\TimeEntryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TimeEntryController extends AppBaseController
{
    /** @var  TimeEntryRepository */
    private $timeEntryRepository;

    public function __construct(TimeEntryRepository $timeEntryRepo)
    {
        $this->timeEntryRepository = $timeEntryRepo;
    }

    /**
     * Display a listing of the TimeEntry.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->timeEntryRepository->pushCriteria(new RequestCriteria($request));
        $timeEntries = $this->timeEntryRepository->all();

        return view('time_entries.index')
            ->with('timeEntries', $timeEntries);
    }

    /**
     * Show the form for creating a new TimeEntry.
     *
     * @return Response
     */
    public function create()
    {
        return view('time_entries.create');
    }

    /**
     * Store a newly created TimeEntry in storage.
     *
     * @param CreateTimeEntryRequest $request
     *
     * @return Response
     */
    public function store(CreateTimeEntryRequest $request)
    {
        $input = $request->all();

        $timeEntry = $this->timeEntryRepository->create($input);

        Flash::success('Time Entry saved successfully.');

        return redirect(route('timeEntries.index'));
    }

    /**
     * Display the specified TimeEntry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $timeEntry = $this->timeEntryRepository->findWithoutFail($id);

        if (empty($timeEntry)) {
            Flash::error('Time Entry not found');

            return redirect(route('timeEntries.index'));
        }

        return view('time_entries.show')->with('timeEntry', $timeEntry);
    }

    /**
     * Show the form for editing the specified TimeEntry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $timeEntry = $this->timeEntryRepository->findWithoutFail($id);

        if (empty($timeEntry)) {
            Flash::error('Time Entry not found');

            return redirect(route('timeEntries.index'));
        }

        return view('time_entries.edit')->with('timeEntry', $timeEntry);
    }

    /**
     * Update the specified TimeEntry in storage.
     *
     * @param  int              $id
     * @param UpdateTimeEntryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTimeEntryRequest $request)
    {
        $timeEntry = $this->timeEntryRepository->findWithoutFail($id);

        if (empty($timeEntry)) {
            Flash::error('Time Entry not found');

            return redirect(route('timeEntries.index'));
        }

        $timeEntry = $this->timeEntryRepository->update($request->all(), $id);

        Flash::success('Time Entry updated successfully.');

        return redirect(route('timeEntries.index'));
    }

    /**
     * Remove the specified TimeEntry from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $timeEntry = $this->timeEntryRepository->findWithoutFail($id);

        if (empty($timeEntry)) {
            Flash::error('Time Entry not found');

            return redirect(route('timeEntries.index'));
        }

        $this->timeEntryRepository->delete($id);

        Flash::success('Time Entry deleted successfully.');

        return redirect(route('timeEntries.index'));
    }
}
