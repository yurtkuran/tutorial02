<? include ('functions.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Atom.Tracker</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- fontawesome -->
        <script src="https://use.fontawesome.com/4550b47fad.js"></script>

        <style>
            .btn-col{width:38px;}
        </style>

    </head>
    <body>
        <div class="container-fluid">
            <header class="row">
                <div class="col-xs-6">
                    <a data-mode="restore" id="btn-mode" href="#">Enter <span id="lbl-mode">Restore</span> Mode</a>
                </div>

                <div class="col-xs-6 text-right">
                    Total Time: <span id="tally"></span>
                </div>
            </header>

            <div class="row">
                <form id="form-new">
                    <div class="col-xs-10">
                        <input id="name" name="name" class="form-control" placeholder="Enter new task name...">
                    </div>

                    <div class="col-xs-2">
                        <button type="submit" name = "submit" class="btn btn-block btn-success"><?=i('play')?></button>
                    </div>     
                </form>           
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>task</th>
                        <th>start</th>
                        <th>end</th>
                        <th>time</th>
                        <th colspan="2">controls</th>
                    </tr>
                </thead>

                <tbody id="log"></tbody>

            </table>
            
        </div>

        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="  crossorigin="anonymous"></script>
        
        <!-- app scripts -->
        <script src="tracker.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>

</html>