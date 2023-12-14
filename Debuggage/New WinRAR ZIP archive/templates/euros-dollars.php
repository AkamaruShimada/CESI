<?php
template(
    'header',
    array(
        'title' => 'Boite à outils • Devise',
    )
);
?>

<!-- ======= About Section ======= -->
<section id="homepage" class="homepage">
    <div class="container">
        <div class="section-title">
            <h2>Convertisseur</h2>
        </div>

        <div class="row">

            <fieldset class="col-12 mt-4">
                <legend>Convertisseur d'unité monétaire</legend>
                <form action="" method="post" name="euros-dollars">
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group">
                                <label for="monnaie1">Sélectionnez la première monnaie :</label>
                                <select id="monnaie1"></select>
                                <label for="monnaie2">Sélectionnez la deuxième monnaie :</label>
                                <select id="monnaie2"></select>
                                <label for="quantite">Somme à convertir :</label>
                                <input type="number" id="quantite" value="1" min="0" step="0.1">
                                <p id="resultat"></p>

                                <script>
                                    // Récupération des monnaies disponibles
                                    axios.get('https://open.er-api.com/v6/latest')
                                        .then(function(response) {
                                            var monnaies = Object.keys(response.data.rates);
                                            for (var i = 0; i < monnaies.length; i++) {
                                                var option1 = document.createElement('option');
                                                option1.value = monnaies[i];
                                                option1.text = monnaies[i];
                                                document.querySelector('#monnaie1').add(option1);

                                                var option2 = document.createElement('option');
                                                option2.value = monnaies[i];
                                                option2.text = monnaies[i];
                                                document.querySelector('#monnaie2').add(option2);
                                            }
                                        })
                                        .catch(function(error) {
                                            console.log(error);
                                        });

                                    // Événement de changement de sélection
                                    document.querySelector('#monnaie1').addEventListener('change', updateConversion);
                                    document.querySelector('#monnaie2').addEventListener('change', updateConversion);
                                    document.querySelector('#quantite').addEventListener('input', updateConversion);

                                    function updateConversion() {
                                        var monnaie1 = document.querySelector('#monnaie1').value;
                                        var monnaie2 = document.querySelector('#monnaie2').value;
                                        var quantite = document.querySelector('#quantite').value;

                                        // Appel de l'API pour obtenir les taux de change des deux monnaies sélectionnées
                                        axios.get('https://open.er-api.com/v6/latest/' + monnaie1)
                                            .then(function(response) {
                                                var taux = response.data.rates[monnaie2];
                                                var resultat = quantite * taux;
                                                document.querySelector('#resultat').innerHTML = quantite + ' ' + monnaie1 + ' = ' + resultat.toFixed(2) + ' ' + monnaie2;
                                            })
                                            .catch(function(error) {
                                                console.log(error);
                                            });
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>

            <fieldset class="col-12 mt-4">
                <legend>Convertisseur de liquides</legend>
                <form action="" method="post" name="euros-dollars">
                    <div class="form-group row">
                        <div class="col">
                            <script>
                                function convertir() {
                                    // Récupération des valeurs sélectionnées
                                    var unites1 = document.getElementById("unites1").value;
                                    var unites2 = document.getElementById("unites2").value;
                                    var valeur = document.getElementById("valeur").value;

                                    // Conversion en litres
                                    switch (unites1) {
                                        case "ml":
                                            valeur /= 1000;
                                            break;
                                        case "cl":
                                            valeur /= 100;
                                            break;
                                        case "dl":
                                            valeur /= 10;
                                            break;
                                        case "l":
                                            break;
                                    }
                                    // Conversion vers l'unité de destination
                                    switch (unites2) {
                                        case "ml":
                                            valeur *= 1000;
                                            break;
                                        case "cl":
                                            valeur *= 100;
                                            break;
                                        case "dl":
                                            valeur *= 10;
                                            break;
                                        case "l":
                                            break;
                                    }

                                    // Affichage du résultat
                                    document.getElementById("resultat1").innerHTML = valeur.toFixed(2) + " " + unites2;
                                }
                            </script>

                            <p>
                                <label for="unites1">Unité d'origine:</label>
                                <select id="unites1">
                                    <option value="ml">Millilitres</option>
                                    <option value="cl">Centilitres</option>
                                    <option value="dl">Décilitres</option>
                                    <option value="l" selected>Litres</option>
                                </select>
                            </p>
                            <p>
                                <label for="unites2">Unité de destination:</label>
                                <select id="unites2">
                                    <option value="ml" selected>Millilitres</option>
                                    <option value="cl">Centilitres</option>
                                    <option value="dl">Décilitres</option>
                                    <option value="l">Litres</option>
                                </select>
                            </p>
                            <p>
                                <label for="valeur">Valeur à convertir:</label>
                                <input type="number" id="valeur" value="0" step="0.01">
                            </p>
                            <button onclick="convertir()">Convertir</button>
                            <p id="resultat1"></p>
                </form>
            </fieldset>
        </div>
    </div>
</section><!-- End Home Section -->
<script type="text/javascript">
    window.addEventListener('load', () => {
        let forms = document.forms;

        for (form of forms) {
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const formData = new FormData(event.target).entries()

                const response = await fetch('/api/post', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(
                        Object.assign(Object.fromEntries(formData), {
                            form: event.target.name
                        })
                    )
                });

                const result = await response.json();

                let inputName = Object.keys(result.data)[0];

                event.target.querySelector(`input[name="${inputName}"]`).value = result.data[inputName];
            })
        }
    });
</script>

<?php template('footer');
