---
title: Home
menu: home
onpage_menu: true
body_classes: "modular header-image fullwidth"
anchors:
    active: false

form:
    action: /home
    name: contact
    fields:
        - name: name
          label: Name
          placeholder: Enter your name
          classes: curtain-contact-form
          autofocus: off
          autocomplete: on
          type: text
          validate:
            required: true

        - name: email
          label: Email
          placeholder: Enter your email address
          classes: curtain-contact-form
          type: email
          validate:
            rule: email
            required: true

        - name: message
          label: Message
          placeholder: Enter your message
          classes: curtain-contact-form
          type: textarea
          validate:
            required: true

    buttons:
        - type: submit
          value: Submit
        - type: reset
          value: Reset

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
        - message: Thank you for getting in touch!
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
            - _about
            - _contact
---
