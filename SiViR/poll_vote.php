<?php
$votes = $_REQUEST['vote'];

$poll_results = "poll_result.txt";
$content = file($poll_results);

$array = explode("/", $content[0]);
$yes_counter = $array[0];
$no_counter = $array[1];

if ($votes == 0) {
  $yes_counter = $yes_counter + 1;
}
if ($votes == 1) {
  $no_counter = $no_counter + 1;
}

$add_new_vote = $yes_counter."/".$no_counter;
$file = fopen($poll_results,"w");
fputs($file,$add_new_vote);
fclose($file);
?>

<h2>Thank you!</h2>

<table>
  <tr>
    <td>Yes:</td>
    <td><img src="public/img/green_gif2.gif"
      width='<?php echo(100*round($yes_counter/($no_counter+$yes_counter),2)); ?>'
      height='25'>
      <?php echo(100*round($yes_counter/($no_counter+$yes_counter),2)); ?>%
    </td>
  </tr>
  
  <tr>
    <td>No:</td>
    <td><img src="public/img/red_gif.gif"
      width='<?php echo(100*round($no_counter/($no_counter+$yes_counter),2)); ?>'
      height='25'>
      <?php echo(100*round($no_counter/($no_counter+$yes_counter),2)); ?>%
    </td>
  </tr>
</table>