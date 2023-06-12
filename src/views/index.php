<?php
    //TITLE OF THE SITE 
        $title = "Todos";

    //INCLUDE HEADER
        include_once "../components/header.php";
        
    //INCLUDE NAVBAR
        include_once "../components/navbar.php";
?>

    <div class="w-full flex justify-center">
        <?php
            //INCLUDE TABLE
            include_once "../components/table.php";
        ?>
    </div>
    <div class="flex justify-end mr-[6.8rem] mt-[1.5rem]">
        <a href="./create_todo.php" class="bg-green-300 w-[8rem] h-[2.5rem] py-2 text-center">Create todo</a>
    </div>

<?php
    //INCLUDE FOOTER
        include_once "../components/footer.php";
?>  