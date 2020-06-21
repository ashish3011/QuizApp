<?php
    session_start();
    include "../connection.php";

    $question_no = "";
    $question="";
    $option1="";
    $option2="";
    $option3="";
    $option4="";
    $answer="";
    $count=0;
    $ans="";

    $queno=$_GET["questionNo"];

    if(isset($_SESSION["answer"][$queno]))
    {
        $ans=$_SESSION["answer"][$queno];
    }
    $res=mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]' && question_no=$_GET[questionNo]");
    $count=mysqli_num_rows($res);

    if($count==0)
    {
        echo "over";
    }
    else{
        while($row=mysqli_fetch_array($res))
        {
            $question_no=$row["question_no"];
            $question=$row["question"];
            $option1=$row["option1"];
            $option2=$row["option2"];
            $option3=$row["option3"];
            $option4=$row["option4"];

        }

        ?>

        <br>
            <table>
                <tr>
                    <td style="font-wieght: bold; font-size: 18px; padding-left: 5px; " colspan="2" >
                        <?php echo "( ".$question_no ." ) ". $question; ?>

                    </td>
                </tr>
            </table>


            <table style="margin-left: 20px; ">
                <tr>
                    <td >
                        <input type="radio" name="r1" id="r1" value="<?php echo $option1; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>);"
                        <?php 
                            if($ans==$option1)
                            {
                                echo "checked";
                            }
                        ?>>
                    </td>
                    <td style="padding-left: 10px;">
                            <?php
                                if(strpos($option1, 'images/')!=false)
                                {
                                    ?>
                                        <img src="admin/<?php echo $option1 ?>" height="30" width="30"; alt="">
                                    <?php
                                }
                                else{
                                    echo $option1;
                                }
                            ?>
                    </td>
                </tr>

                <tr>
                    <td >
                        <input type="radio" name="r1" id="r1" value="<?php echo $option2; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>);"
                        <?php 
                            if($ans==$option2)
                            {
                                echo "checked";
                            }
                        ?>>
                    </td>
                    <td style="padding-left: 10px;">
                            <?php
                                if(strpos($option2, 'images/')!=false)
                                {
                                    ?>
                                        <img src="admin/<?php echo $option2 ?>" height="30" width="30"; alt="">
                                    <?php
                                }
                                else{
                                    echo $option2;
                                }
                            ?>
                    </td>
                </tr>

                <tr>
                    <td >
                        <input type="radio" name="r1" id="r1" value="<?php echo $option3; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>);"
                        <?php 
                            if($ans==$option3)
                            {
                                echo "checked";
                            }
                        ?>>
                    </td>
                    <td style="padding-left: 10px;">
                            <?php
                                if(strpos($option3, 'images/')!=false)
                                {
                                    ?>
                                        <img src="admin/<?php echo $option3 ?>" height="30" width="30"; alt="">
                                    <?php
                                }
                                else{
                                    echo $option3;
                                }
                            ?>
                    </td>
                </tr>

                <tr>
                    <td >
                        <input type="radio" name="r1" id="r1" value="<?php echo $option4; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>);"
                        <?php 
                            if($ans==$option4)
                            {
                                echo "checked";
                            }
                        ?>>
                    </td>
                    <td style="padding-left: 10px;">
                            <?php
                                if(strpos($option4, 'images/')!=false)
                                {
                                    ?>
                                        <img src="admin/<?php echo $option4 ?>" height="30" width="30"; alt="">
                                    <?php
                                }
                                else{
                                    echo $option4;
                                }
                            ?>
                    </td>
                </tr>
            </table>
        <?php
    }
?>