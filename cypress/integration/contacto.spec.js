/// <reference types="cypress" />

describe('Prueba el Formulario de Contacto', () => {
    it('Prueba la página de contacto y el envío de emails', () => {
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de Contacto');
        
        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Rellene el Formulario de Contacto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Rellene el Formulario');
    });

    it('Llena los campos del formulario', () => {
        cy.get('[data-cy="input-nombre"]').type('Migue');
        cy.get('[data-cy="input-mensaje"]').type('Deseo comprar una casa');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-precio"]').type('1500000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();
        cy.wait(2000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        cy.get('[data-cy="input-telefono"]').type('665461137');
        cy.get('[data-cy="input-fecha"]').type('2021-08-12');
        cy.get('[data-cy="input-hora"]').type('10:30');

        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'exito');
    });
});