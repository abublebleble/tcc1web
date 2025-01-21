<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="card">
                <div class="card-inner">
                    <!-- Front Side -->
                    <div class="card-front">
                        <p>Bem-vindo, {{ Auth::user()->name }}!</p>
                    </div>
                    <!-- Back Side -->
                    <div class="card-back">
                        <p>Bom treino!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Card Styles */
        .card {
            width: 300px;
            height: 200px;
            perspective: 1000px;
            margin: 0 auto; /* Center the card */
        }

        .card-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            animation: flip 7.5s infinite; /* Rotate every 3 seconds */
        }

        /* Keyframes for auto-rotation */
        @keyframes flip {
            0% {
                transform: rotateY(0deg);
            }
            50% {
                transform: rotateY(180deg);
            }
            100% {
                transform: rotateY(360deg);
            }
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 24px;
            color: black;
        }

        .card-front {
            background-color: #29d45c; 
            border: 1px solid #29d45c;
            transform: rotateY(0deg);
        }

        .card-back {
            background-color: #29d45c; 
            border: 1px solid #29d45c;
            transform: rotateY(180deg);
        }
    </style>
</x-app-layout>
