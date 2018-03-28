@extends('base')

@section('content')

    <div class="card text-center">
        <div class="card-header">
            Craft Axe Locations
        </div>
        <div class="card-body">
            <h5 class="card-title">Please select your location:</h5>
            <p class="card-text">to gain access to the timer management system</p>


    <form action="/timers">
    <select  id="location_id" class="drop" name="location_id">
        <?

            foreach($locations as $location) {
                echo '<option value="' . $location->id . '">' . $location->name . '</option>';
            }


        ?>
    </select>
        <input type="submit" value="Submit">
    </form>
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>
@endsection
