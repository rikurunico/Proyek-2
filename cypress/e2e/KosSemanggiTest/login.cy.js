/// <reference types="cypress" />

describe("User Can Open Login Page", () => {
    it("Login Page Can Be Open And Have Correct Specification", () => {
        cy.visit("http://127.0.0.1:8000/login");
        cy.get(".sign-in-container > form > h1").should("have.text", "Sign In");
        cy.get('.sign-in-container > form > [type="text"]').should(
            "have.attr",
            "placeholder",
            "Username"
        );
        cy.get('.sign-in-container > form > [type="password"]').should(
            "have.attr",
            "placeholder",
            "Password"
        );
    });

    it("User Can Login", () => {
        cy.visit("http://127.0.0.1:8000/login");
        cy.get(".sign-in-container > form > [type='text']").type("test");
        cy.get('.sign-in-container > form > [type="password"]').type("test");
        cy.get(".sign-in-container > form > button").click();
    });
});
