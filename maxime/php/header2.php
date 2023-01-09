<!DOCTYPE html>
<html>

<head>
    <style>
        .question {
            margin-top: 30%;
            position: relative;
            text-align: center;
        }

        .answer-bubble {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 1000px;
            background-color: white;
            border: 1px solid black;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.9);
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s linear 0.2s, opacity 0.2s linear;
        }

        .answer-bubble::before {
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -10px;
            border-width: 10px;
            border-style: solid;
            border-color: white transparent transparent transparent;
        }

        .question:hover .answer-bubble,
        .answer-bubble.active {
            visibility: visible;
            opacity: 1;
            transition-delay: 0s;
        }

        .answer-bubble-content {
            padding: 16px;
        }

        .answer-bubble-content.active {
            border: 2px solid blue;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="question">
        <div class="question-title">Comment jumeler sa montre avec son compte ?</div>
        <div class="answer-bubble">
            <div class="answer-bubble-content">
                Il est très simple de synchroniser la montre à votre compte, un code vous sera fourni lors de l'acquisition de la montre. Il suffira d'aller votre compte et mettre ce code pour jumeler les deux ensemble.
            </div>
        </div>
    </div>

    <script>
        const questions = document.querySelectorAll('.question');
        questions.forEach(question => {
            const title = question.querySelector('.question-title');
            const bubble = question.querySelector('.answer-bubble');
            title.addEventListener('click', () => {
                bubble.classList.toggle('active');
            });
        });
    </script>
</body>

</html>