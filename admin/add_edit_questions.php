<?php
    session_start();
    include "header.php";
    include "../connection.php";
    if(!isset($_SESSION["admin"]))
    {
        ?>
        <script type="text/javascript">
        window.location="index.php";
        </script>
        <?php
    }
    $id=$_GET["id"];
    $exam_category='';
    $res=mysqli_query($link, "select * from exam_category where id = $id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category = $row["category"];
    }
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Question inside  <?php echo "<font color='red'>" .$exam_category. "</font>"; ?></h1>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                
                            <div class="col-lg-6">
                                <form action="" name="form1" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header"><strong>Add New Questions Text</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text" placeholder="Add question" class="form-control" name="question"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 1</label><input type="text" placeholder="Add option 1" class="form-control" name="option1"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 2</label><input type="text" placeholder="Add option 2" class="form-control" name="option2"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 3</label><input type="text" placeholder="Add option 3" class="form-control" name="option3"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 4</label><input type="text" placeholder="Add option 4" class="form-control" name="option4"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label><input type="text" placeholder="answer" class="form-control" name="answer"></div>

                                    <div class="form-group">
                                        <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                                    </div>
                                        
                                                    </div>
                                                </div>
                                        
                                            </div>

                                            <div class="col-lg-6">
                               
                        <div class="card">
                            <div class="card-header"><strong>Add New Questions Images</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="file" placeholder="Add question" class="form-control" name="fquestion" style="padding-bottom: 40px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 1</label><input type="file" placeholder="Add option 1" class="form-control" name="foption1" style="padding-bottom: 40px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 2</label><input type="file" placeholder="Add option 2" class="form-control" name="foption2" style="padding-bottom: 40px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 3</label><input type="file" placeholder="Add option 3" class="form-control" name="foption3" style="padding-bottom: 40px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Option 4</label><input type="file" placeholder="Add option 4" class="form-control" name="foption4" style="padding-bottom: 40px;"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label><input type="file" placeholder="answer" class="form-control" name="fanswer" style="padding-bottom: 40px;"></div>

                                    <div class="form-group">
                                        <input type="submit" name="submit2" value="Add Question" class="btn btn-success">
                                    </div>
                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            </form>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Questions</th>
                                        <th>Option1</th>
                                        <th>Option2</th>
                                        <th>Option3</th>
                                        <th>Option4</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                

                                <?php 
                                    $res=mysqli_query($link,"select * from questions where category='$exam_category' order by question_no asc");

                                    while($row=mysqli_fetch_array($res))
                                    {
                                        echo"<tr>";
                                        echo"<td>"; echo $row["question_no"]; echo"</td>";
                                        echo"<td>"; 
                                        
                                            if(strpos($row["question"], 'opt_images/')!==false)
                                            {
                                                ?>

                                                    <img src="<?php  echo$row["question"]; ?>" height="50" width="50">

                                                <?php
                                            }
                                            else{
                                                echo $row["question"];
                                            }

                                        echo"</td>";
                                        
                                        echo"<td>"; 
                                        
                                        if(strpos($row["option1"], 'opt_images/')!==false)
                                        {
                                            ?>

                                                <img src="<?php  echo$row["option1"]; ?>" height="50" width="50">

                                            <?php
                                        }
                                        else{
                                            echo $row["option1"];
                                        }

                                        echo"</td>";

                                        echo"<td>"; 
                                        
                                        if(strpos($row["option2"], 'opt_images/')!==false)
                                        {
                                            ?>

                                                <img src="<?php  echo$row["option2"]; ?>" height="50" width="50">

                                            <?php
                                        }
                                        else{
                                            echo $row["option2"];
                                        }

                                        echo"</td>";

                                        echo"<td>"; 
                                        
                                        if(strpos($row["option3"], 'opt_images/')!==false)
                                        {
                                            ?>

                                                <img src="<?php  echo$row["option3"]; ?>" height="50" width="50">

                                            <?php
                                        }
                                        else{
                                            echo $row["option3"];
                                        }

                                        echo"</td>";

                                        echo"<td>"; 
                                        
                                        if(strpos($row["option4"], 'opt_images/')!==false)
                                        {
                                            ?>

                                                <img src="<?php  echo$row["option4"]; ?>" height="50" width="50">

                                            <?php
                                        }
                                        else{
                                            echo $row["option4"];
                                        }

                                        echo"</td>";

                                        echo "<td>";

                                        if(strpos($row["option4"], 'opt_images/')!==false)
                                        {
                                            ?>

                                            <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id ?>">Edit</a>

                                            <?php
                                        }
                                        else{

                                            ?>
                                            <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id ?>">Edit</a>
                                            <?php
                                        }

                                        echo "</td>";

                                        echo "<td>";
                                        ?>

                                            <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id ?>">Delete</a>

                                        <?php

                                        echo "</td>";

                                        echo"</tr>";
                                    }
                                ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

<?php
    if(isset($_POST["submit1"]))
    {
        $loop = 0;

            $count = 0;
            $res = mysqli_query($link, "select * from questions where category = '$exam_category' order by id asc") or die(mysqli_error($link));

            $count = mysqli_num_rows($res);

            if($count = 0)
            {

            }
            else{

                while($row = mysqli_fetch_array($res))
                {
                    $loop = $loop + 1;
                    mysqli_query($link, "update questions set question_no ='$loop' where id=$row[id]");
                }

            }

        $loop = $loop + 1;

        mysqli_query($link, "insert into questions values(NULL, '$loop', '$_POST[question]', '$_POST[option1]', '$_POST[option2]', '$_POST[option3]', '$_POST[option4]', '$_POST[answer]', '$exam_category')") or die(mysqli_error($link));

        ?>
            <script type="text/javascript">
                alert("question added successfully");
                window.location.href=window.location.href;
            </script>
        <?php
    }
?>

<?php
    if(isset($_POST["submit2"]))
    {
        $loop = 0;

            $count = 0;
            $res = mysqli_query($link, "select * from questions where category = '$exam_category' order by id asc") or die(mysqli_error($link));

            $count = mysqli_num_rows($res);

            if($count = 0)
            {

            }
            else{

                while($row = mysqli_fetch_array($res))
                {
                    $loop = $loop + 1;
                    mysqli_query($link, "update questions set question_no ='$loop' where id=$row[id]");
                }

            }

        $loop = $loop + 1;

        $tm=md5(time());

        $fnm1=$_FILES["fquestion"]["name"];
        $dst1="./opt_images/".$tm.$fnm1;
        $dst_db1="opt_images/".$tm.$fnm1;
        move_uploaded_file($_FILES["fquestion"]["tmp_name"],$dst1);

        $fnm2=$_FILES["foption1"]["name"];
        $dst2="./opt_images/".$tm.$fnm2;
        $dst_db2="opt_images/".$tm.$fnm2;
        move_uploaded_file($_FILES["foption1"]["tmp_name"],$dst2);

        $fnm3=$_FILES["foption2"]["name"];
        $dst3="./opt_images/".$tm.$fnm3;
        $dst_db3="opt_images/".$tm.$fnm3;
        move_uploaded_file($_FILES["foption2"]["tmp_name"],$dst3);

        $fnm4=$_FILES["foption3"]["name"];
        $dst4="./opt_images/".$tm.$fnm4;
        $dst_db4="opt_images/".$tm.$fnm4;
        move_uploaded_file($_FILES["foption3"]["tmp_name"],$dst4);

        $fnm5=$_FILES["foption4"]["name"];
        $dst5="./opt_images/".$tm.$fnm5;
        $dst_db5="opt_images/".$tm.$fnm5;
        move_uploaded_file($_FILES["foption4"]["tmp_name"],$dst5);

        $fnm6=$_FILES["fanswer"]["name"];
        $dst6="./opt_images/".$tm.$fnm6;
        $dst_db6="opt_images/".$tm.$fnm6;
        move_uploaded_file($_FILES["fanswer"]["tmp_name"],$dst6);

        mysqli_query($link, "insert into questions values(NULL, '$loop', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$dst_db5', '$dst_db6', '$exam_category')") or die(mysqli_error($link));

        ?>
            <script type="text/javascript">
                alert("question added successfully");
                window.location.href=window.location.href;
            </script>
        <?php
    }
?>
    <?php
        include "footer.php";
    ?>

    