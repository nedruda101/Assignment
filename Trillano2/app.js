$(document).ready(function () {
    $(".form-group-time-quantum").hide();

    $('#algorithmSelector').on('change', function () {
        if (this.value === 'optRR') {
            $(".form-group-time-quantum").show(1000);
        } else {
            $(".form-group-time-quantum").hide(1000);
        }
    });

    var processList = [];

    $('#btnAddProcess').on('click', function () {
        var processID = $('#processID');
        var arrivalTime = $('#arrivalTime');
        var burstTime = $('#burstTime');

        if (processID.val() === '' || arrivalTime.val() === '' || burstTime.val() === '') {
            processID.addClass('is-invalid');
            arrivalTime.addClass('is-invalid');
            burstTime.addClass('is-invalid');
            return;
        }

        var process = {
            processID: parseInt(processID.val(), 10),
            arrivalTime: parseInt(arrivalTime.val(), 10),
            burstTime: parseInt(burstTime.val(), 10)
        };

        processList.push(process);

        $('#tblProcessList > tbody').append(
            `<tr>
                <td>${process.processID}</td>
                <td>${process.arrivalTime}</td>
                <td>${process.burstTime}</td>
            </tr>`
        );

        processID.val('');
        arrivalTime.val('');
        burstTime.val('');
    });

    $('#btnCalculate').on('click', function () {
        if (processList.length == 0) {
            alert('Please insert some processes');
            return;
        }

        var selectedAlgo = $('#algorithmSelector').val();

        if (selectedAlgo === 'optSJF') {
            shortestJobFirst();
        }
    });

    function shortestJobFirst() {
        var completedList = [];
        var time = 0;
        var queue = [];

        while (processList.length > 0 || queue.length > 0) {
            addToQueue();
            while (queue.length == 0) {
                time++;
                addToQueue();
            }
            var processToRun = selectProcess();
            for (var i = 0; i < processToRun.burstTime; i++) {
                time++;
                addToQueue();
            }
            processToRun.completedTime = time;
            processToRun.turnAroundTime = processToRun.completedTime - processToRun.arrivalTime;
            processToRun.waitingTime = processToRun.turnAroundTime - processToRun.burstTime;
            completedList.push(processToRun);
        }

        function addToQueue() {
            for (var i = 0; i < processList.length; i++) {
                if (processList[i].arrivalTime <= time) {
                    var process = {
                        processID: processList[i].processID,
                        arrivalTime: processList[i].arrivalTime,
                        burstTime: processList[i].burstTime
                    };
                    processList.splice(i, 1);
                    queue.push(process);
                }
            }
        }

        function selectProcess() {
            if (queue.length != 0) {
                queue.sort(function (a, b) {
                    return a.burstTime - b.burstTime;
                });
            }
            return queue.shift();
        }

        // Bind table data
        $.each(completedList, function (key, process) {
            $('#tblResults > tbody').append(
                `<tr>
                    <td>${process.processID}</td>
                    <td>${process.arrivalTime}</td>
                    <td>${process.burstTime}</td>
                    <td>${process.completedTime}</td>
                    <td>${process.waitingTime}</td>
                    <td>${process.turnAroundTime}</td>
                </tr>`
            );
        });

        // Calculate average turnaround time
        var totalTurnaroundTime = 0;

        $.each(completedList, function (key, process) {
            totalTurnaroundTime += process.turnAroundTime;
        });

        var avgTurnaroundTime = totalTurnaroundTime / completedList.length;

        $('#avgTurnaroundTime').val(avgTurnaroundTime);

        // Calculate average waiting time
        var totalWaitingTime = 0;

        $.each(completedList, function (key, process) {
            totalWaitingTime += process.waitingTime;
        });

        var avgWaitingTime = totalWaitingTime / completedList.length;

        $('#avgWaitingTime').val(avgWaitingTime);

        // Calculate throughput
        var maxCompletedTime = 0;

        $.each(completedList, function (key, process) {
            if (process.completedTime > maxCompletedTime) {
                maxCompletedTime = process.completedTime;
            }
        });

        $('#throughput').val(completedList.length / maxCompletedTime);
    }
});