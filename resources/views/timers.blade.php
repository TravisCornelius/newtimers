@extends('base')

@section('content')
    <h2><? echo $location->name; ?></h2>

    <div name="container">
    <?

    foreach($timers as $timer) {

        if ($timer->id == 1 || $timer->id == 5 || $timer->id == 9 || $timer->id == 13 || $timer->id == 17){
            echo '<div class="row">';
        }

        echo '<div class="col-sm-6" style="padding: 25px">';
        echo '<div class="card" style="width: 18rem;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">';
        echo "Lane: " . $timer->lane_id;
        $name = "demo" . $timer->id;
        echo '<br>';
        echo "<p id='". $name . "'></p>";
        echo '</h5>';
?>


        <div class="btn-group" role="group" aria-label="Basic example">
            <form action="/start_timer">
                <? echo '<input type="hidden"  name="timer_id" value="' . $timer->id . '"">'; ?>
                <? echo '<input type="hidden" name="location_id" value="' . $location->id . '"">'; ?>
                <button type="submit" target="_self" class="btn btn-secondary btn-success">Start</button>
            </form>
            <form action="/clear_timer">
                <? echo '<input type="hidden"  name="timer_id" value="' . $timer->id . '"">'; ?>
                <? echo '<input type="hidden" name="location_id" value="' . $location->id . '"">'; ?>
                <button type="submit" class="btn btn-secondary btn-danger">Clear</button>
            </form>
            <form action="/add5_timer">
                <? echo '<input type="hidden"  name="timer_id" value="' . $timer->id . '"">'; ?>
                <? echo '<input type="hidden" name="location_id" value="' . $location->id . '"">'; ?>
                <button type="submit" class="btn btn-secondary btn-primary">Add 5 mins</button>
            </form>
        </div>

            <script>
                var x = setInterval(function() {
                    var id = "<?php echo $timer->id; ?>";
                    var time = "<?php echo $timer->start_time?>"
                    var countDownDate = new Date(time).getTime();
                    var now = new Date().getTime();
                    var distance = countDownDate - now;

                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="demo"
                    document.getElementById("demo" + id).innerHTML = days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s ";

                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo" + id).innerHTML = "EXPIRED";
                        document.getElementById("demo" + id).style.color = "red";
                    }
                }, 1000);

            </script>
            </div>
        </div>
    </div>
    <?
    if ( $timer->id == 4 || $timer->id == 8 || $timer->id == 12 || $timer->id == 16){
        echo '</div>';
    }
    }
    ?>

</div>
    </div>
@endsection
