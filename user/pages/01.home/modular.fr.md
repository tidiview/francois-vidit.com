---
title: Accueil
menu: accueil
onpage_menu: true
body_classes: "modular header-image fullwidth"
cache_enable: false
anchors:
    active: false   

form:
    action: /home
    name: contact
    fields:
        - name: name
          label: Nom
          placeholder: Faîtes figurer votre nom
          classes: curtain-contact-form
          autofocus: off
          autocomplete: on
          type: text
          validate:
            required: true

        - name: email
          label: Adresse électronique
          placeholder: Faîtes figurer votre adresse électronique
          classes: curtain-contact-form
          type: email
          validate:
            rule: email
            required: true

        - name: message
          label: Message
          placeholder: Rédigez votre message
          classes: curtain-contact-form
          type: textarea
          validate:
            required: true

    buttons:
        - type: submit
          value: Valider
        - type: reset
          value: Annuler

    process:
        - email:
            from: "{{ config.plugins.email.from }}"
            to:
              - "{{ config.plugins.email.from }}"
              - "{{ form.value.email }}"
            subject: "[Site Contact Form] {{ form.value.name|e }}"
            body: "{% include 'forms/data.html.twig' %}"
        - save:
            fileprefix: contact-
            dateformat: Ymd-His-u
            extension: txt
            body: "{% include 'forms/data.txt.twig' %}"
        - message: Merci de nous avoir contacté ♪
        - display: thankyou

content:
    items: '@self.modular'
    order:
        by: default
        dir: asc
        custom:
            - _landing-curtain
            - _blog
            - _docs
            - _guide
            - _contact
---
