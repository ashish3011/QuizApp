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
    $id = $_GET["id"];
    $id1=$_GET["id1"];
    $question="";
    $option1="";
    $option2="";
    $option3="";
    $option4="";
    $answer="";
    $res = mysqli_query($link, "select * from questions where id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $question=$row["question"];
        $option1=$row["option1"];
        $option2=$row["option2"];
        $option3=$row["option3"];
        $option4=$row["option4"];
        $answer=$row["answer"];
    }
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Question With Images</h1>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                            <div class="col-lg-12">
                               
                               <div class="card">
                                   <div class="card-header"><strong>Update Questions Images</strong></div>
                                   <div class="card-body card-block">
                                       <div class="form-group">
                                    <img src="<?php echo $question ?>" height="50" width="50" alt="">  <br>  
                                       <label for="company" class=" form-control-label">Add Question</label><input type="file" placeholder="Add question" class="form-control" name="fquestion" style="padding-bottom: 40px;" value=""></div>
                                       <div class="form-group">
                                       <img src="<?php echo $option1 ?>" height="50" width="50" alt="">  <br>    
                                       <label for="company" class=" form-control-label">Add Option 1</label><input type="file" placeholder="Add option 1" class="form-control" name="foption1" style="padding-bottom: 40px;"></div>
                                       <div class="form-group">
                                       <img src="<?php echo $option2 ?>" height="50" width="50" alt="">  <br>    
                                       <label for="company" class=" form-control-label">Add Option 2</label><input type="file" placeholder="Add option 2" class="form-control" name="foption2" style="padding-bottom: 40px;"></div>
                                       <div class="form-group">
                                       <img src="<?php echo $option3 ?>" height="50" width="50" alt="">  <br>    
                                       <label for="company" class=" form-control-label">Add Option 3</label><input type="file" placeholder="Add option 3" class="form-control" name="foption3" style="padding-bottom: 40px;"></div>
                                       <div class="form-group">
                                       <img src="<?php echo $option4 ?>" height="50" width="50" alt="">  <br>    
                                       <label for="company" class=" form-control-label">Add Option 4</label><input type="file" placeholder="Add option 4" class="form-control" name="foption4" style="padding-bottom: 40px;"></div>
                                       <div class="form-group">
                                       <img src="<?php echo $answer ?>" height="50" width="50" alt="">  <br>    
                                       <label for="company" class=" form-control-label">Add Answer</label><input type="file" placeholder="answer" class="form-control" name="fanswer" style="padding-bottom: 40px;"></div>
       
                                           <div class="form-group">
                                               <input type="submit" name="submit2" value="Update Question" class="btn btn-success">
                                           </div>
                                               
                                                           </div>
                                                       </div>
                                                      
                                                   </div>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col-->

                </div>
            </div>
        </div>


    <?php
        if(isset($_POST["submit2"]))
        {
            $question=$_FILES["fquestion"]["name"];
            $option1=$_FILES["foption1"]["name"];
            $option2=$_FILES["foption2"]["name"];
            $option3=$_FILES["foption3"]["name"];
            $option4=$_FILES["foption4"]["name"];
            $answer=$_FILES["fanswer"]["name"];

            $tm=md5(time());
            if($question!="")
            {
                $dst1="./opt_images/".$tm.$question;
                $dst_db1="opt_images/".$tm.$question;
                move_uploaded_file($_FILES["fquestion"]["tmp_name"],$dst1);
                mysqli_query($link, "update questions set question='$dst_db1' where id=$id") or die(mysqli_error($link));
            }

            if($option1!="")
            {
                $dst2="./opt_images/".$tm.$option1;
                $dst_db2="opt_images/".$tm.$option1;
                move_uploaded_file($_FILES["foption1"]["tmp_name"],$dst2);
                mysqli_query($link, "update questions set option1='$dst_db2' where id=$id") or die(mysqli_error($link));
            }

            if($option2!="")
            {
                $dst3="./opt_images/".$tm.$option2;
                $dst_db3="opt_images/".$tm.$option2;
                move_uploaded_file($_FILES["foption2"]["tmp_name"],$dst3);
                mysqli_query($link, "update questions set option2='$dst_db3' where id=$id") or die(mysqli_error($link));
            }

            if($option3!="")
            {
                $dst4="./opt_images/".$tm.$option3;
                $dst_db4="opt_images/".$tm.$option3;
                move_uploaded_file($_FILES["foption3"]["tmp_name"],$dst4);
                mysqli_query($link, "update questions set option3='$dst_db4' where id=$id") or die(mysqli_error($link));
            }

            if($option4!="")
            {
                $dst5="./opt_images/".$tm.$option4;
                $dst_db5="opt_images/".$tm.$option4;
                move_uploaded_file($_FILES["foption4"]["tmp_name"],$dst5);
                mysqli_query($link, "update questions set option4='$dst_db5' where id=$id") or die(mysqli_error($link));
            }

            if($answer!="")
            {
                $dst6="./opt_images/".$tm.$answer;
                $dst_db6="opt_images/".$tm.$answer;
                move_uploaded_file($_FILES["fanswer"]["tmp_name"],$dst6);
                mysqli_query($link, "update questions set answer='$dst_db6' where id=$id") or die(mysqli_error($link));
            }

            ?>  
                <script type="text/javascript">
                    window.location="add_edit_questions.php?id=<?php echo $id1 ?>";
            </script>
            <?php
        }
    ?>
    <?php
        include "footer.php";
    ?>