<?php
    require("./php/cn.php");

    $sen = "SELECT * FROM eventos WHERE	color !='#000'";
    $res = mysqli_query($con, $sen);
    $c = -1;
    $inp="<input 
            type='radio' 
            name='radEve' ide='0' 
            data-id='0'
            id='che0' checked>";
    $lab="<Label 
            style='--bg:#000' 
            class='active' 
            for='che0'>
            Otro
        </Label>";
    while ($row = mysqli_fetch_array($res)) {
        $c++;
        $inp.="<input 
                    type='radio' 
                    name='radEve' ide='{$row['id']}' 
                    data-id='{$row['id']}'
                    id='che{$row['id']}' >";
        $lab.="<Label 
                    style='--bg:{$row['color']}' 
                    class='' 
                    for='che{$row['id']}'>
                    {$row['evento']}
                </Label>";
    }
    

?>
    <div class="eventos-reservados">
        <?php echo $inp; ?>
        <div class="field">
            <div class="bg-label">
                <?php echo $lab; ?>
            </div>
        </div>
    </div>
