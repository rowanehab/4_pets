<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <title>About Us</title>
    <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/aboutUs.css?v=<?php echo time();?>">
    <style>
    body {
        background-image: url("css/image.jpg");
    }

    </style>

</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <ul class="navbar-nav">
            <a class="nav-item" href="userlanding0.php">
                <img src="css/logo.png" width="60" height="60">
            </a>

            <div id="takeAction" class="collapse navbar-collapse">
                <li class="nav-item">
                    <a href="userlanding.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="contactUs.php" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="aboutUs.php" class="nav-link">About Us</a>
                </li>
            </div>
        </ul>
        <a href="#takeAction" data-toggle="collapse" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </a>
    </nav>
    <!--navbar-->


    <div class="paragraph">
        <h1>About Us</h1>
        <p>Our clinic name "4 Pets" indicates " For Pets" ,
            we try to help you caring about your pet and give your pet the life it deserves.
            <br> we introduce all kinds of care for all kinds of pets because they can’t tell what’s wrong so we can do
            this.
        </p>

    </div>
    <div class="paragraph">
        <h2>Our Services</h2>
        <p>At 4 Pets Clinic, we offer comprehensive medical services and integrative therapies for all kinds of Pets in
            the area of Cairo or Giza;
            <br> including wellness checkups, vaccinations, surgery, dental care and laser therapy and
            PEMF(Pulsed ElectroMagnetic Field therapy).
        </p>

        <div class="row p-2 text-center">
            <div class="col-md-4">

                <div class="card cardView h-100" id="wellnesscheckups">
                    <img src="css/wellnessCheckup-removebg.png" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">Wellness Checkups</h3>
                        <p class="card-text scroller">It’s important for your pet to see a vet at least once each year.
                            We
                            perform in-clinic physical examinations to monitor your pet’s wellness.
                            Our head-to-tail exams include checking body weight, temperature, looking at the eyes, ears,
                            nose, mouth, hair coat and skin, evaluating the heart, lungs, abdomen, and lymph nodes, and
                            checking muscles and joints.</p>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card cardView h-100" id="vaccinations">
                    <img src="css/vaccine-removebg.png" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">vaccinations</h3>
                        <p class="card-text ">Protecting pets from diseases like distemper, parvovirus, and rabies,
                            vaccinations are a critical part of your pet’s health.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card cardView h-100" id="surgery">
                    <img src="css/s1-removebg-preview.png" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">Surgery</h3>
                        <p class="card-text scroller">As a full service veterinary clinic, we offer cutting-edge,
                            affordable
                            outpatient surgical services, including spay/neuter, removal of mass and foreign body, wound
                            repair and select emergency surgeries.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2 text-center">

            <div class="col-md-4">
                <div class="card cardView h-100" id="dentalcare">
                    <img src="css/dental1-removebg-preview.png" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">Dental Care</h3>
                        <p class="card-text scroller">Dental hygiene is an important part of your pet’s health! We offer
                            comprehensive dentistry services,including full dental examinations, teeth cleanings, dental
                            x-rays, and dental surgery.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card cardView h-100" id="lasertherapy">
                    <img src="css/laser-removebg-preview.png" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">Laser Therapy (PEMF)</h3>
                        <p class="card-text scroller">Used to treat a variety of conditions, laser therapy is a
                            non-invasive,
                            pain-free, surgery-free, drug-free alternative treatment method. It can be used in
                            conjunction with more conventional treatment protocols. Depending on your pet’s condition,
                            relief is often evident within hours of treatment. Pulsed Electromagnetic Fields (PEMF) are
                            said to allow an animal’s body to achieve a natural state of wellness. MagnaWave machines
                            have a unique electrical current that runs through a copper coil that creates a pulsing
                            magnetic field. Using PEMF is said to promote cellular exercise, increase oxygenation, and
                            reduce inflammation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="paragraph">
        <h2>General Q&A</h2>

        <div class="card FAQcards">

            <h4>Is it safe to give my dog bones to chew on?</h4>
            <button data-target="#answer1" class="btn dropdown-toggle " data-toggle="collapse">Answer</button>
            <p id="answer1" class="collapse">No! Dogs should NEVER be given raw or cooked animal bones for several
                reasons. Raw bones run the risk of transmitting harmful bacteria, including Salmonella or Campylobacter,
                both to your dog and any exposed people. These bacteria can be transmitted through a dog’s stool and
                saliva.</p>
        </div>


        <div class="card FAQcards">
            <h4>What plants are toxic for cats? </h4>
            <button data-target="#answer2" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer2" class="collapse">More than 700 plants have been identified as toxic to cats, including
                common house plants like:tulips and corn plants. For a list of toxic and non-toxic plants for cats,
                visit <a href="https://www.aspca.org/pet-care/animal-poison-control/cats-plant-list" target="_blank">
                    ASPCA’s page.</a>

                If you think your cat has ingested a poisonous substance, <a href="ContactUs.html"
                    target="_blank">Contact Us</a> or hurry up to make one of our vets see your cat.</p>
        </div>

        <div class="card FAQcards">
            <h4>What plants are toxic for dogs?</h4>
            <button data-target="#answer3" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer3" class="collapse">While some plants can just give your dog diarrhea, there are others that
                are extremely poisonous and can cause serious problems, like liver damage. The most common poisonous
                plants for dogs include sago palms and tulips. For a list of toxic and non-toxic plants for dogs, visit
                <a href="https://www.aspca.org/pet-care/animal-poison-control/dogs-plant-list" target="_blank"> ASPCA’s
                    page.</a>
                If you think your dog has ingested a poisonous substance, <a href="ContactUs.html"
                    target="_blank">Contact Us</a> or hurry up to make one of our vets see your dog.
            </p>
        </div>

        <div class="card FAQcards">
            <h4>What foods are toxic for cats and dogs?</h4>
            <button data-target="#answer4" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer4" class="collapse">There are dozens of household foods that are toxic for pets and should
                never be ingested, including: chocolate, cherries, onions, garlic, mushrooms, grapes, raisins, alcohol,
                yeast products, macadamia nuts, and cooked bones. Visit <a
                    href="https://www.aspca.org/pet-care/animal-poison-control/people-foods-avoid-feeding-your-pets"
                    target="_blank"> ASPCA’s page</a> for more information on toxic foods.

                If you think your cat or dog has ingested a poisonous substance, <a href="ContactUs.html"
                    target="_blank">Contact Us</a> or hurry up to make one of our vets see your pet.</p>
        </div>

        <div class="card FAQcards">
            <h4>How do I know if my pet's signs indicate an emergency?</h4>
            <button data-target="#answer5" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer5" class="collapse">Signs that indicate an emergency include: the inability to urinate,
                bleeding, a bloated hard abdomen, excessive vomiting or diarrhea, seizures, unconsciousness, sudden
                changes in respiration, and the inability to stand up.

                Other signs of illness should be checked by a veterinarian within 24 hours.</p>
        </div>

        <div class="card FAQcards">
            <h4>Can you help with dog training?</h4>
            <button data-target="#answer6" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer6" class="collapse">No, we don’t have dog training facilities in our clinic.</p>
        </div>

        <div class="card FAQcards">
            <h4>Are you accepting new patients at this time?</h4>
            <button data-target="#answer7" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer7" class="collapse">Yes we are! Please <a href="signUp.html" target="_blank"> Sign Up</a>
                First.</p>
        </div>

        <div class="card FAQcards">
            <h4>What is the best way to make an appointment?</h4>
            <button data-target="#answer8" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer8" class="collapse">Please <a href="signUp.html" target="_blank"> Sign Up</a> First , then
                choose Book an Appointment.</p>
        </div>


        <div class="card FAQcards">
            <h4>Can my dog or cat spread COVID-19 to me?</h4>
            <button data-target="#answer9" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer9" class="collapse">COVID-19 is a virus that is effectively transmitted from human-to-human.
                There is currently no evidence to suggest that animals, including companion animals or pets, are playing
                a role in the spread of COVID-19.</p>
        </div>

        <div class="card FAQcards">
            <h4>Is my dog or cat a healthy weight?</h4>
            <button data-target="#answer10" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer10" class="collapse">When we examine your pet, we evaluate all the systems, including weight.
                We do a Body Condition Score, which is something you can do at home too!<a
                    href="https://drsophiayin.com/blog/entry/is-your-dog-fit-or-fat-learn-how-to-body-condition-score-him/"
                    target="_blank"> Press Here</a> for more information.</p>
        </div>

        <div class="card FAQcards">
            <h4>What food is healthiest for pets?</h4>
            <button data-target="#answer11" class="btn dropdown-toggle" data-toggle="collapse">Answer</button>
            <p id="answer11" class="collapse">Every pet is unique, as every person is. No diet is perfect for every pet.
                Ask your veterinarian for diet suggestions as we know your pet’s current health status and can help
                guide you to diets that may be most appropriate. This is especially important if your pet has a medical
                condition, as diet plays a large role in disease management.</p>
        </div>



    </div>



    <br><br><br><br>

    <!--footer-->
    <div class="footer">
        <footer class="bg-light text-center text-lg-start fixed-bottom">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
        </footer>
    </div>
    <!--footer-->




    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/aboutUs.js"></script>
</body>

</html>
