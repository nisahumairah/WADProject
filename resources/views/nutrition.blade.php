@extends('master.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Nutrition Tracker</h2>

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Protein</h5>
                    <p class="card-text fs-4">65g / 120g</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Carbs</h5>
                    <p class="card-text fs-4">180g / 300g</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Fats</h5>
                    <p class="card-text fs-4">40g / 70g</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-start gap-4 flex-wrap">
    {{-- Donut Chart --}}
    <div class="mb-5">
    <canvas id="myDonutChart" width="250" height="250"></canvas>
</div>


    {{-- Water Intake Tracker --}}
    <div class="card p-3 shadow-sm rounded flex-grow-1" style="width: 700px;">
        <h6 class="text-center mb-3">💧 Water Intake</h6>
        <div class="d-flex justify-content-center flex-wrap gap-2 mb-3" id="glasses">
            {{-- Glass icons added by JS --}}
        </div>
        <div class="d-flex justify-content-center gap-3">
            <button class="btn btn-sm btn-outline-primary px-3" onclick="addGlass()">+</button>
            <button class="btn btn-sm btn-outline-danger px-3" onclick="removeGlass()">−</button>
        </div>
    </div>
</div>


    <h4 class="mb-3">Today's Meals</h4>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Meal Type</th>
                <th>Food Items</th>
                <th>Calories</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Breakfast</td>
                <td>Bread<br>Peanut Butter</td>
                <td>120 kcal<br>95 kcal</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lunch</td>
                <td>Nasi<br>Boiled Egg<br>Bayam</td>
                <td>120 kcal<br>77 kcal<br>31 kcal</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Dinner</td>
                <td>Chicken<br>Rice<br>Vegetables</td>
                <td>200 kcal<br>150 kcal<br>50 kcal</td>
            </tr>
        </tbody>
    </table>
</div>
        {{-- carousel for tips --}}
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <<div class="text-center">🍽️ <strong>Tip:</strong> Drink a glass of water before meals to stay hydrated.</div>
    </div>
    </div>
    <div class="carousel-item">
     <div class="text-center">🥗 <strong>Tip:</strong> Include vegetables in every meal for fiber and nutrients.</div>
    </div>
    <div class="carousel-item">
      <div class="text-center">🕋 <strong>Halal Tip:</strong> Always check for halal certification when buying processed food.</div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection

@section('scripts')
<!-- ✅ Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myDonutChart').getContext('2d');
    const myDonutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Protein', 'Carbs', 'Fats'],
            datasets: [{
                label: 'Macronutrients',
                data: [65, 180, 40],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
</script>

<!-- 💧 Water Intake Script -->
<script>
    let waterCount = 4;
    const maxWater = 8;

    function renderGlasses() {
        const container = document.getElementById('glasses');
        container.innerHTML = '';
        for (let i = 0; i < maxWater; i++) {
            const glass = document.createElement('span');
            glass.innerHTML = i < waterCount ? '🥛' : '⚪️'; // Filled or empty
            glass.style.fontSize = '24px';
            container.appendChild(glass);
        }
    }

    function addGlass() {
        if (waterCount < maxWater) {
            waterCount++;
            renderGlasses();
        }
    }

    function removeGlass() {
        if (waterCount > 0) {
            waterCount--;
            renderGlasses();
        }
    }

    // Render on load
    document.addEventListener('DOMContentLoaded', renderGlasses);
</script>

@endsection
