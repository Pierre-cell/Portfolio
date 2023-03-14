<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ressources/css/apropos.css">
    <title>À propos</title>
</head>

<body>
    <?php
    session_start();
    include './navbar.php';
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

    ?>
    <script>
        // Some random colors
        const colors = ["#FFD685", "#FFEBC2", "#80909C", "#002038"];

        const numBalls = 50;
        const balls = [];

        for (let i = 0; i < numBalls; i++) {
            let ball = document.createElement("div");
            ball.classList.add("ball");
            ball.style.background = colors[Math.floor(Math.random() * colors.length)];
            ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
            ball.style.top = `${Math.floor(Math.random() * 100)}vh`;
            ball.style.transform = `scale(${Math.random()})`;
            ball.style.width = `${Math.random()}em`;
            ball.style.height = ball.style.width;

            balls.push(ball);
            document.body.append(ball);
        }

        // Keyframes
        balls.forEach((el, i, ra) => {
            let to = {
                x: Math.random() * (i % 2 === 0 ? -11 : 11),
                y: Math.random() * 12
            };

            let anim = el.animate(
                [{
                        transform: "translate(0, 0)"
                    },
                    {
                        transform: `translate(${to.x}rem, ${to.y}rem)`
                    }
                ], {
                    duration: (Math.random() + 1) * 2000, // random duration
                    direction: "alternate",
                    fill: "both",
                    iterations: Infinity,
                    easing: "ease-in-out"
                }
            );
        });
    </script>
    <h1>Qui-sommes-nous ?</h1>
    <div class="concert">
        <p>
            Inauguré en 1994, G4 Arena compte parmi l'une des plus grandes salles de spectacles du Sud de la France. Sa capacité d'accueil modulable allant jusqu'à 2 500 spectateurs en fait un lieu de passage obligé pour les plus grands artistes internationaux.

            Le bâtiment doit son nom à son architecture en forme d'arêne, rappelant explicitement le Vélodrome (meilleur stade de France).

            Aujourd'hui, G4 Arena comptabilise des millions de spectateurs qui sont venus y applaudir diverses formes de spectacles. Des concerts aux grandes comédies musicales en passant par la danse, le théâtre, les one-man-show ou encore les salons ou conventions d'entreprise, tout y est réuni pour recevoir les plus grands artistes dans les meilleures conditions.

            Une équipe professionnelle, rigoureuse et expérimentée est à votre disposition pour toute demande d'information.
        </p>
        <img class="photo1" src="/ressources/img/salleint.png" />
    </div>
    <div class="concert2">
        <p>Mieux qu’une adresse mythique, mieux qu’un show mémorable : un show mémorable dans une adresse mythique. G4 Arena est le lieu de tous les rendez-vous et de tous les possibles.


            Un lieu où vous avez eu la chance de voir Prince rejoindre Stevie Wonder sur scène. Un lieu où vous avez eu le plaisir d'entendre plus de 90 fois la voix puissante de Johnny Hallyday. Un lieu où vous avez repris en chœur 12 fois le tube Niggas In Paris de Jay-Z & Kanye West pendant le même concert. Et c'est ici aussi sous vos yeux ébahis que les stars et légendes de la NBA ont fait trembler le parquet en janvier 2019.​


            G4 Arena se raconte de mille manières, records et anecdotes. Une enceinte marseillaise grandiose, millésimée par le temps et par ses événements. ​Son rayonnement dépasse ainsi très largement les frontières françaises et la classe aujourd’hui parmi les cinq premières arenas mondiales.​
        </p>
    </div>
    <div class="concert3">
        <img class="photo2" src="/ressources/img/coeur.jpg" />
        <div class="texte">
            <h2>Notre identité/ADN</h2></br>

            <p>G4 Arena, c’est là qu’on se rencontre, qu’on se passionne et qu’on ose tout. Exaltant, audacieux, chaleureux et collectif, ça c’est G4 Arena exactement ! Parce qu’ils pensent avant tout à vous, aucune limite n’arrête ceux qui s’engagent au quotidien pour faire vivre l’Arena et partager l’exaltation et la vibration unique du live. C'est le lieu des frissons infinis où il fait bon vivre, pour vous sentir toujours un peu plus comme chez vous. L’Arena s’ouvre au quartier, à Marseille, pour donner à tous le loisir de profiter d’une salle de spectacle devenue véritable lieu de vie.​
            </p>
        </div>
    </div>
    <?php
    include './footer.php';
    ?>
</body>

</html>