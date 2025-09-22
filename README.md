# WildTracks API Demo - PHP Scripts

This repository contains PHP demo scripts for working with the [WildTracks API](https://wildtracks.pro).  
Each script fetches geographic data (roads, postal codes, forests, mountains, etc.) for a given country.

---

## 📂 Files

- `config.php` — Configuration file with API token  
- `roads.php` — Get roads, railroads by country  https://wildtracks.pro/api/roads/
- `locality.php` — Get cities, villages, populated places  https://wildtracks.pro/api/locality/
- `administrative_division.php` — Get administrative divisions (ADM1, ADM2, etc.)  https://wildtracks.pro/api/administrative_division/
- `water.php` — Get rivers, lakes, reservoirs, streams  https://wildtracks.pro/api/water/
- `parks.php` — Get parks, areas, reserves  https://wildtracks.pro/api/parks/
- `undersea.php` — Get undersea features (reefs, seamounts, ridges)  https://wildtracks.pro/api/undersea/
- `spot.php` — Get spots/buildings (airports, hotels, factories, etc.)  https://wildtracks.pro/api/country_side/
- `forests.php` — Get forests, vineyards, cultivated areas  https://wildtracks.pro/api/forests/
- `mountains.php` — Get mountains, hills, rocks  https://wildtracks.pro/api/mountains/

---

## Usage

Replace the demo token in `config.php` with your own token.
Visit `roads.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `locality.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `administrative_division.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `water.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `parks.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `undersea.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `spot.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `forests.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
Visit `mountains.php?country=bb` (replace `bb` with ISO-3166 country code) to see the data.
