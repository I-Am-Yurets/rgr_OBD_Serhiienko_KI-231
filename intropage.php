<?php 
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
    <h2>Welcome, <span><?php echo $_SESSION['session_username']; ?>!</span></h2>
    <p><a href="logout.php">Log out</a> of the system. Also, you can see database tables and do other operations.</p>
    <div class="button-container">
        <a href="php_insert_update_delete_search.php" class="button">DB Operations</a>
        <a href="officer.php" class="button">DB Tables</a>
    </div>
</div>
	
<?php include("includes/footer.php"); ?>
	
<?php endif; ?>
