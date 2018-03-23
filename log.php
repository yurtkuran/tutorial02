<?
include('functions.php');

$json = file_get_contents('data.json');
$data = json_decode($json,1);
if(is_array($data)){
    krsort($data);
}


switch($_GET['mode']){
    case 'status':
        $id = $_GET['id'];
        $data[$id]['status'] = 1;
        save($data);
    break;

    case 'remove':
        $id = $_GET['id'];
        $data[$id]['status'] = 2;
        save($data);
    break;

    case 'stop':
        $id = $_GET['id'];
        if($data[$id]['date_end']==''){
            $data[$id]['date_end'] = time();
            save($data);
        }
    break;

    case 'new':
      $id = time();
      $data[$id]['id'] = $id;
      $data[$id]['name'] = $_GET['name'];
      $data[$id]['date_start'] = $id;
      $data[$id]['date_end'] = '';
      $data[$id]['date_entered'] = $id;
      $data[$id]['status'] = 1;
      echo '<script>console.log("Your stuff here")</script>';
      save($data); // Save changes
    break;

    case "tally":
        $count = 0;
        if(is_array($data)){
            foreach($data as $task){
                if($task['status']==1){
                    $count = $count + ($task['date_end']=="" ? time() : $task['date_end']) - $task['date_start'];
                }
            }
        }
        echo timeNice($count);
    break;

    case "build":
        if(is_array($data)){

            foreach($data as $task){
                if($task['status']==1){?>                    
                    <tr>
                        <td><?=$task['name']?></td>
                        <td><?=dateReadable($task['date_start'])?></td>
                        <td>
                            <?
                            if($task['date_end'] != ""){
                                echo dateReadable($task['date_end']);
                            }
                            ?>
                        </td>
                        <td>
                            <?
                            if($task['date_end']=="") {
                                echo timeNice(time()-$task['date_start']);
                            } else {
                                echo timeNice($task['date_end']-$task['date_start']);
                            }
                            ?>
                        </td>
                        <td class="btn-col"><button data-id="<?=$task['id']?>" class="btn btn-primary btn-stop" <?=($task['date_end']!='')?'disabled':''?>><?=i('stop')?></button></td>
                        <td class="btn-col"><button data-id="<?=$task['id']?>" class="btn btn-danger btn-remove"><?=i('times')?></button></td>
                    </tr>
        <?}}}
    break;

    case "restore":
        if(is_array($data)){

            foreach($data as $task){
                if($task['status']==2){?>                    
                    <tr>
                        <td><?=$task['name']?></td>
                        <td><?=dateReadable($task['date_start'])?></td>
                        <td>
                            <?
                            if($task['date_end'] != ""){
                                echo dateReadable($task['date_end']);
                            }
                            ?>
                        </td>
                        <td>
                            <?
                            if($task['date_end']=="") {
                                echo timeNice(time()-$task['date_start']);
                            } else {
                                echo timeNice($task['date_end']-$task['date_start']);
                            }
                            ?>
                        </td>
                        <td class="btn-col"></td>
                        <td class="btn-col"><button data-id="<?=$task['id']?>" class="btn btn-info btn-restore"><?=i('refresh')?></button></td>
                    </tr>
        <?}}}
    break;


}
?>


