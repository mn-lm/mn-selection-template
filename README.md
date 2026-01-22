# Motivo Network – Selection Template

Questo repository fornisce un ambiente di sviluppo WordPress containerizzato, pensato per la selezione tecnica.  
L’obiettivo è permetterti di lavorare subito sul codice, senza configurazioni locali o dipendenze aggiuntive.

---

## Requisiti

- Visual Studio Code
- GitHub Codespaces Extension for VSCode

---

## !! Attenzione !!
Per funzionare correttamente (http://localhost:8080), il progetto deve essere 
aperto e modificato in Visual Studio Code, non nel browser.


---

## In breve

Avvio del progetto

```bash
docker compose up -d
```

### Frontend
http://localhost:8080

### Admin WordPress
http://localhost:8080/wp-admin

Attendere un paio di minuti

---

## Avvio dell’ambiente

Dalla root del progetto esegui:

```bash
docker compose up -d
```

Per verificare che i container siano attivi:

```bash
docker ps
```

---

## Arresto e reset dell’ambiente

### Arresto dei container

```bash
docker compose down
```

### Reset completo dell’ambiente

```bash
docker compose down -v
```

**Attenzione:**  
Il comando con `-v` elimina anche i dati del database.

---

## URL di accesso

### Frontend
http://localhost:8080

### Admin WordPress
http://localhost:8080/wp-admin

Le credenziali di accesso sono già configurate nell’ambiente di sviluppo.

---

## Dove lavorare

L’unica parte del progetto su cui intervenire è il tema custom:

```text
wp-content/themes/motnet-selection
```

In particolare:

- `components/exercise-*` → esercizi da completare

Il resto dell’installazione WordPress non va modificato.

---

## Nota sull’HTTP

È stata scelta una configurazione **HTTP** per semplificare l’ambiente ed evitare complessità non rilevanti ai fini della selezione.  
La valutazione riguarda esclusivamente la qualità del codice e dell’implementazione dei componenti.

---

## Troubleshooting rapido

Verifica che i container siano attivi:

```bash
docker ps
```

Reset completo dell’ambiente:

```bash
docker compose down -v
docker compose up -d
```