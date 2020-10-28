{% extends 'base.volt' %}

{% block title %} Notre Site | Show index {% endblock %}

{% block content %}

    <main>

        <h1>Bienvenue sur la page Show</h1>

        <h2>Show - IndexController</h2>

        <p>
        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aliquam debitis ducimus eos exercitationem,
        	ipsum minima nostrum nulla officiis perferendis placeat quia, quo tempora, velit! Assumenda odit possimus velit!
        </p>

        <p>
            Donnée de l'url : {{ var }}
        </p>

    </main>

{% endblock %}


