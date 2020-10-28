
{% extends 'base.volt' %}

{% block title %} Notre Site {% endblock %}

{% block content %}

    <main>

        <div class="container mt-5 pt-5">

            <h1>Bienvenue sur la page principal</h1>

            <h2>Index - IndexController</h2>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aliquam debitis ducimus eos exercitationem,
                ipsum minima nostrum nulla officiis perferendis placeat quia, quo tempora, velit! Assumenda odit possimus velit!
            </p>

            <p>
                Bonjour : {{ name }} {{ value }}<br><br>

                {% for i in tab %}
                    {{ tab[i] }}
                {% endfor %}
            </p>

        </div>

    </main>

{% endblock %}



