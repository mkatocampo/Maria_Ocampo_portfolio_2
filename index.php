<?php
$pageTitle="Home";
include "includes/session.php";
include "includes/dbFunctions.php";
include "includes/dbConnection.php";
include "includes/header.php";
?> 
<main>


<section id="Welcome" style="box-sizing:border-box; width: 100%; height: 100vh;background-color:#8e7f97";>
    <div style="padding:100px;text-align:center">    
        <div style="position:relative;margin:auto;">
            <img src="assets/kat.gif" style="border-radius: 50%; max-width:50%; max-height:50%"/>
        </div>
    </div>
</section>

<section id="AboutMe" style="box-sizing:border-box; width: 100%; height: 100vh;background-color:#dbc9e5;position:relative";>
    <div style="padding:100px; ">    
        <h1 style="font-family: 'Lobster', cursive; color:#8e7f97">About Me</h1>
        <div class="row">

        <div class="col-1"></div>

        <div class="col-3" style="position:absolute;top:40%;left:5%;">
            <div class="container" style="border: 10px dashed;padding:30px; border-color:mediumpurple; background:linear-gradient(white,#dbc9e5)">
                <h3 style="margin-top:-25%; padding:10px;background:mediumpurple;color:white; width:fit-content;">IT Dev</h3>
                <div>
                    - HTML<br>
                    - CSS/Bootstrap<br>
                    - C#<br>
                    - PHP<br>
                    - Java<br>
                    - JavaScript<br>
                    - Jira<br>
                    - Confluence<br>
                    - Github<br>
                </div>
            </div>
        </div>

        <div clas="col-1"></div>

        <div class="col-3" style="position:absolute;top:20%;left:40%;">
            <div class="container" style="border: 10px dashed;padding:30px; border-color:mediumpurple; background:linear-gradient(white,#dbc9e5)">
                <h3 style="margin-top:-25%; padding:10px;background:mediumpurple;color:white; width:fit-content;">IT Compliance</h3>
                <div>
                    - GxP Regulations<br>
                    - Good Documentation Practices<br>
                    - HP ALM<br>
                    - Veeva Vault (QMS)<br>
                </div>
            </div>
        </div>

        <div clas="col-1"></div>

        <div class="col-3" style="position:absolute;top:60%;right:10%;">
            <div class="container" style="border: 10px dashed;padding:30px; border-color:mediumpurple; background:linear-gradient(white,#dbc9e5)">
                <h3 style="margin-top:-25%; padding:10px;background:mediumpurple;color:white; width:fit-content;">Business</h3>
                <div>
                    - Financial Audit<br>
                    - Accounting<br>
                    - ERP Systems (SAP, MS Nav)<br>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="Works" style="box-sizing:border-box; width: 100%; height: 100vh;background-color:#ffd7e6;position:relative";>
    <div style="padding:100px;">    
        <h1 style="font-family: 'Lobster', cursive; color:#8e7f97">Works & Projects</h1>
        <br><br>
        <div class="row" width="80%">
            
            <div class="col-2"></div>

            <a href="/allProjs.php" style="height:55px;background-color:palevioletred; color:white; padding:10px;";>View all projects</a>
            <div class="col-8" style="border:5px solid palevioletred; height:auto; width:100%;padding:20px; background:linear-gradient(white,#ffd7e6)">    
                <div style="padding: 10px;opacity: 0.6;">
                    <div style="background-color:palevioletred; color: white; text-align:justify;width:100%">
                        <h2>Latest Projects</h2>
                        <hr style="background-color: #fff">
                        
                        <?php
                            $result=getLatestProjects($conn);
                            $countOfProjs = $result->num_rows;
                            
                            if($countOfProjs > 0){
                                while ($row = $result->fetch_assoc()){
                                    $time=strtotime($row['created_at']);
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $description = $row['teaser'];
                                    $content = $row['proj_text'];

                                    echo  "<li>$title<a href='projDetails.php?id=$id&imageIndex=0' style='color:yellow'> <sub>[Open Project...]</sub></a></li></br>";
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>

            <div class="col-2"></div>

        </div>
    </div>
</section>

<section id="Blogs" style="box-sizing:border-box; width: 100%; height: 100vh;background-color:#cfe9fe;position:relative";>
    <div style="padding:100px;">    
        <h1 style="font-family: 'Lobster', cursive; color:#8e7f97">Blogs</h1>
        <br><br>
        <div class="row" width="80%">

            <div class="col-2"></div>
            
            <div class="col-8" style="border:5px solid teal; height:auto; width:100%;padding:20px; background:linear-gradient(white,#cfe9fe)">
                <div class="row" style="padding: 10px;opacity: 0.6">
                    <div class="col-7" style="background-color:teal; color: white; text-align:justify; ">
                        <h2>Some stuff about cats, I mean Kat!</h2>
                        <hr style="background-color: #fff">
                        <p>Sharing things I have learned, learning and want to learn. 
                            If you are a business person and want to transition to IT, maybe this blog can help.</p>
                        <p>Check out my blogs to see what I've been up to lately.
                            I write things about my studies, work and of course, about myself! 
                            If there is anything you want to know from me, drop me a message<a href="contact.php" style="color: yellow">>>here<<</a> 
                        </p>
                    </div>
                    <div class="col-5">
                        <img src="assets/kat1.png" style="object-fit:contain; width:100%; ">
                    </div>
                </div>
            </div>
            <a href="/allBlogs.php" style="height:55px;background-color:teal; color:white; padding:10px;";>View all blogs</a>
            
            <div class="col-2"></div>
        </div>
    </div>
</section>
<?php include "includes/footer.php"; ?>