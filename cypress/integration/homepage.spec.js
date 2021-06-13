/// <reference types="cypress" />

describe('Carga la página principal', () => {
    it('Prueba el header de la página principal', () =>{
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas y Apartamentos Exclusivos de Lujo');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices');
    });

    it('Prueba más sobre nosotros', () => {
        cy.visit('/');

        cy.get('[data-cy="sobre-nosotros"]').should('exist');
        cy.get('[data-cy="sobre-nosotros"]').invoke('text').should('equal', 'Más Sobre Nosotros');
        cy.get('[data-cy="sobre-nosotros"]').invoke('text').should('not.equal', 'Bienes Raices');
        cy.get('[data-cy="sobre-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');

        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length', 4);
    });

    it('Prueba la sección de propiedades', () => {
        cy.get('[data-cy="anuncio"]').should('have.length', 3);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 5);

        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').should('not.have.class', 'boton-amarillo');
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver Propiedad');
        cy.get('[data-cy="enlace-propiedad"]').first().click()
        cy.get('[data-cy="titulo-propiedad"]').should('exist');

        //cy.wait(1000);
        cy.go('back');
    });

    it('Prueba el routing hacia todas las propiedades', () => {
        cy.get('[data-cy="ver-propiedades"]').should('exist');
        cy.get('[data-cy="ver-propiedades"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="ver-propiedades"]').invoke('attr', 'href').should('equal', '/propiedades');
        cy.get('[data-cy="ver-propiedades"]').click()
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal', 'Casas y Apartamentos en Venta');

        //cy.wait(1000);
        cy.go('back');
    });

    it('Prueba el bloque de contacto', () => {
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'Rellena el formulario de contacto y un asesor se pondrá en contacto contigo lo antes posible');
        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href').then(href => {
            cy.visit(href)
        });

        cy.get('[data-cy="heading-contacto"]').should('exist');

        //cy.wait(1000);
        cy.visit('/');

    });

    it('Prueba el blog y comentarios', () => {
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('not.equal', 'Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length', 2);

        cy.get('[data-cy="comentarios"]').should('exist');
        cy.get('[data-cy="comentarios"]').find('h3').invoke('text').should('equal', 'Comentarios');
        cy.get('[data-cy="comentarios"]').find('h3').invoke('text').should('not.equal', 'Nuestros Comentarios');

    })
});