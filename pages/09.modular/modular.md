---
content:
    items: '@self.modular'
    order:
        by: default
        dir: asc
        custom:
            - _callout
            - _features

form:
    action: /modular
    name: contact
    fields:
        - name: name
          label: Nom
          placeholder: Faîtes figurer votre nom ici ...
          autofocus: on
          autocomplete: on
          type: text
          validate:
            required: true

        - name: email
          label: Adresse électronique
          placeholder: Faîtes figurer votre adresse électronique ici ...
          type: email
          validate:
            rule: email
            required: true

        - name: message
          label: Message
          placeholder: Rédigez votre message ici ...
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
            subject: "[Site Contact Form] {{ form.value.name|e }}"
            body: "{% include 'forms/data.html.twig' %}"
        - save:
            fileprefix: contact-
            dateformat: Ymd-His-u
            extension: txt
            body: "{% include 'forms/data.txt.twig' %}"
        - message: Merci de nous avoir contacté ♪
---

