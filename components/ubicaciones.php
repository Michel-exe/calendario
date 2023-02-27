<?php
    require("./php/cn.php");

    $sen = "SELECT * FROM ubicaciones WHERE nombre !='vacio' ";
    $res = mysqli_query($con, $sen);
    $c = -1;
    $inp="<input 
            type='radio' 
            name='radUbi' ide='0' 
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
                    name='radUbi' ide='{$row['id']}' 
                    data-id='{$row['id']}'
                    id='cheubi{$row['id']}' 
                >";
        $lab.="<Label 
                    style='--bg:{$row['color']}' 
                    class='' 
                    for='cheubi{$row['id']}'>
                    {$row['nombre']}
                </Label>";
    }
    

?>
<div class="ubicaciones-reservadas">
    <?php echo $inp; ?>
    <div class="field">
        <div class="bg-label">
            <?php echo $lab; ?>
        </div>
    </div>
</div>