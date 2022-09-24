/// <reference types="cypress" />

describe("User Can Open Dormitories Page", () => {
    it("Dormitories Page Can Be Open And Have Correct Specification", () => {
        cy.visit("http://127.0.0.1:8000/dashboard");
        cy.get(".h4").should("have.text", "Data Kos Semanggi Barat 18");
    });

    it("User Can Add Data In Dormitories Page", () => {
        cy.visit("http://127.0.0.1:8000/dashboard");
        cy.get(":nth-child(6) > .nav-link").click();
        cy.get('[href="http://127.0.0.1:8000/dashboard/dormitory"]').click();
        cy.get(".flex-wrap > .btn").click();
        cy.get("#name").type("Nico");
        cy.get("#address").type("Jl. Semanggi Barat 18");
        cy.get("#phone_number").type("081234567890");
        cy.get("form > .btn").click();
    });

    it("User Can Edit Data In Dormitories Page", () => {
        cy.visit("http://127.0.0.1:8000/dashboard/dormitory/1/edit");
        cy.get("#name").clear().type("Wazir");
        cy.get("#address").clear().type("Jl. Semanggi Barat 18");
        cy.get("#phone_number").clear().type("081234567111");
        cy.get("form > .btn").click();
    });

    it("User Can Read Data In Dormitories Page", () => {
        cy.visit("http://127.0.0.1:8000/dashboard/dormitory/1");
        cy.get(":nth-child(1) > .col-md-7 > .form-control").should(
            "have.text",
            "Wazir"
        );
    });

    it("User Can Delete Data In Dormitories Page", () => {
        cy.visit("http://127.0.0.1:8000/dashboard/dormitory/1");
        cy.get(".btn-danger").click();
        cy.get("h3").should("have.text", "Tidak ada Data Penghuni");
    });
});
