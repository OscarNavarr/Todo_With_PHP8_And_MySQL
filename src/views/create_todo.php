<?php
    //TITLE OF THE SITE 
        $title = "Create Todo";

    //INCLUDE HEADER
        include_once "../components/header.php";
    
        //INCLUDE NAVBAR
        $title_navbar = "Create Todo";
        include "../components/navbar.php";


        if (!empty($_POST)) {
            
            if(isset($_POST["title"], $_POST["description"]) && !empty($_POST["title"]) && !empty($_POST["description"])) {

                include_once "../../connection/connection.php";
                
                $title = strip_tags($_POST["title"]);
                $description = strip_tags($_POST["description"]);

                //CREATE TO DO ON THE DATABASE
                $sql = "INSERT INTO `todo_list` (`title`, `description`) VALUES (:title, :description)";
                
                $query = $db->prepare($sql);
                
                $query->bindValue(":title", $title, PDO::PARAM_STR);
                $query->bindValue(":description", $description, PDO::PARAM_STR);
                
                $query->execute();

                //RETURN TO SITE
                header("Location:./index.php");
            }else {
                die("You must enter a title and description");
            }
        }
?>

    <div class="w-full flex justify-center mt-[12rem]">
        <form method="post">
            <div>
                <label for="title" class="mr-[2rem]">Title</label>
                <input class="border-b-[0.1rem] border-b-black" type="text" name="title" id="title">
            </div>
            <div class="mt-[1rem]">
                <label for="description" class="mr-[0.5rem]">Content</label>
                <input class="border-b-[0.1rem] border-b-black" type="text" name="description" id="description">
            </div>
            
            <div class="flex">
                <button class="border-[0.1rem] border-black bg-green-300 w-[8rem] mt-[1rem] mr-2" type="submit">Send</button>
                <a href="./index.php" class="bg-black text-white py-[0.1rem] w-[7rem] h-[1.6rem] mt-[1rem] text-center">Go Back</a>
            </div>
        </form>
    </div>

<?php
    //INCLUDE FOOTER
        include_once "../components/footer.php";
?>  