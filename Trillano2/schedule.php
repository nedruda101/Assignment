<?php

function shortestJobFirst($processList) {
    $completedList = [];
    $time = 0;
    $queue = [];

    while (!empty($processList) || !empty($queue)) {
        addToQueue();
        while (empty($queue)) {
            $time++;
            addToQueue();
        }
        $processToRun = selectProcess();
        for ($i = 0; $i < $processToRun['burstTime']; $i++) {
            $time++;
            addToQueue();
        }
        $processToRun['completedTime'] = $time;
        $processToRun['turnAroundTime'] = $processToRun['completedTime'] - $processToRun['arrivalTime'];
        $processToRun['waitingTime'] = $processToRun['turnAroundTime'] - $processToRun['burstTime'];
        $completedList[] = $processToRun;
    }

    function addToQueue() {
        global $processList, $time, $queue;
        foreach ($processList as $key => $process) {
            if ($process['arrivalTime'] === $time) {
                array_push($queue, $process);
                unset($processList[$key]);
            }
        }
        // Re-index the array to remove gaps
        $processList = array_values($processList);
    }

    function selectProcess() {
        global $queue;
        if (!empty($queue)) {
            usort($queue, function ($a, $b) {
                return $a['burstTime'] > $b['burstTime'] ? 1 : -1;
            });
        }
        return array_shift($queue); // Select the process with the shortest burst time
    }

    return $completedList;
}

// Example usage:
$processList = [
    ['processID' => 1, 'arrivalTime' => 2, 'burstTime' => 6],
    ['processID' => 2, 'arrivalTime' => 5, 'burstTime' => 2],
    ['processID' => 3, 'arrivalTime' => 1, 'burstTime' => 8],
    ['processID' => 4, 'arrivalTime' => 0, 'burstTime' => 3],
    ['processID' => 5, 'arrivalTime' => 4, 'burstTime' => 4],
];

$completedList = shortestJobFirst($processList);

// You can now display the results in HTML or format it as needed.
?>

<!-- HTML Table to Display Results -->
<table>
    <tr>
        <th>Process</th>
        <th>Arrival Time</th>
        <th>Burst Time</th>
        <th>Completed Time</th>
        <th>Waiting Time</th>
        <th>Turnaround Time</th>
    </tr>
    <?php foreach ($completedList as $process) : ?>
        <tr>
            <td><?php echo $process['processID']; ?></td>
            <td><?php echo $process['arrivalTime']; ?></td>
            <td><?php echo $process['burstTime']; ?></td>
            <td><?php echo $process['completedTime']; ?></td>
            <td><?php echo $process['waitingTime']; ?></td>
            <td><?php echo $process['turnAroundTime']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
