<?php
return [
    '@class' => 'Grav\\Common\\Config\\CompiledLanguages',
    'timestamp' => 1504843878,
    'checksum' => '3267df56fd0849de3003a7e011d294d3',
    'files' => [
        'system/languages' => [
            'ar' => [
                'file' => 'system/languages/ar.yaml',
                'modified' => 1504836493
            ],
            'ca' => [
                'file' => 'system/languages/ca.yaml',
                'modified' => 1504836493
            ],
            'cs' => [
                'file' => 'system/languages/cs.yaml',
                'modified' => 1504836493
            ],
            'da' => [
                'file' => 'system/languages/da.yaml',
                'modified' => 1504836493
            ],
            'de' => [
                'file' => 'system/languages/de.yaml',
                'modified' => 1504836493
            ],
            'el' => [
                'file' => 'system/languages/el.yaml',
                'modified' => 1504836493
            ],
            'en' => [
                'file' => 'system/languages/en.yaml',
                'modified' => 1504836493
            ],
            'es' => [
                'file' => 'system/languages/es.yaml',
                'modified' => 1504836493
            ],
            'fi' => [
                'file' => 'system/languages/fi.yaml',
                'modified' => 1504836493
            ],
            'fr' => [
                'file' => 'system/languages/fr.yaml',
                'modified' => 1504836493
            ],
            'hr' => [
                'file' => 'system/languages/hr.yaml',
                'modified' => 1504836493
            ],
            'hu' => [
                'file' => 'system/languages/hu.yaml',
                'modified' => 1504836493
            ],
            'it' => [
                'file' => 'system/languages/it.yaml',
                'modified' => 1504836493
            ],
            'ja' => [
                'file' => 'system/languages/ja.yaml',
                'modified' => 1504836493
            ],
            'lt' => [
                'file' => 'system/languages/lt.yaml',
                'modified' => 1504836493
            ],
            'nb' => [
                'file' => 'system/languages/nb.yaml',
                'modified' => 1504836493
            ],
            'nl' => [
                'file' => 'system/languages/nl.yaml',
                'modified' => 1504836493
            ],
            'no' => [
                'file' => 'system/languages/no.yaml',
                'modified' => 1504836493
            ],
            'pl' => [
                'file' => 'system/languages/pl.yaml',
                'modified' => 1504836493
            ],
            'pt' => [
                'file' => 'system/languages/pt.yaml',
                'modified' => 1504836493
            ],
            'ro' => [
                'file' => 'system/languages/ro.yaml',
                'modified' => 1504836493
            ],
            'ru' => [
                'file' => 'system/languages/ru.yaml',
                'modified' => 1504836493
            ],
            'sk' => [
                'file' => 'system/languages/sk.yaml',
                'modified' => 1504836493
            ],
            'sv' => [
                'file' => 'system/languages/sv.yaml',
                'modified' => 1504836493
            ],
            'th' => [
                'file' => 'system/languages/th.yaml',
                'modified' => 1504836493
            ],
            'tr' => [
                'file' => 'system/languages/tr.yaml',
                'modified' => 1504836493
            ],
            'uk' => [
                'file' => 'system/languages/uk.yaml',
                'modified' => 1504836493
            ],
            'vi' => [
                'file' => 'system/languages/vi.yaml',
                'modified' => 1504836493
            ]
        ],
        'user/plugins' => [
            'plugins/error' => [
                'file' => 'user/plugins/error/languages.yaml',
                'modified' => 1504836493
            ],
            'plugins/external_links' => [
                'file' => 'user/plugins/external_links/languages.yaml',
                'modified' => 1504843666
            ],
            'plugins/simplesearch' => [
                'file' => 'user/plugins/simplesearch/languages.yaml',
                'modified' => 1504836493
            ]
        ]
    ],
    'data' => [
        'en' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Error',
                'ERROR_MESSAGE' => 'Woops. Looks like this page doesn\'t exist.'
            ],
            'PLUGINS' => [
                'EXTERNAL_LINKS' => [
                    'PLUGIN_NAME' => 'External Links',
                    'PLUGIN_STATUS' => 'Plugin status',
                    'STATUS_HELP' => 'Set to false to disable this plugin completely.',
                    'BUILTIN_CSS' => 'Use built in CSS',
                    'WEIGHT' => 'Order of execution',
                    'SETTINGS' => 'Settings',
                    'CONTENT' => 'Content',
                    'EXCLUDE' => [
                        'SECTION' => 'Exclusion',
                        'SECTION_HELP' => 'Exclude links with a specific class or domains from being recognized as external links.',
                        'CLASSES' => 'Exclude all links with this class',
                        'CLASSES_HELP' => 'Comma separated list.',
                        'DOMAINS' => 'A list of domains to be excluded',
                        'DOMAINS_HELP' => 'Comma separated list of domains e.g. _localhost/*_  (any regular expression can be used)'
                    ],
                    'LINKS' => [
                        'SECTION' => 'Links',
                        'SECTION_HELP' => 'Set links starting with <code>www.</code> and within the list of allowed schemes as external.',
                        'WWW' => 'Link WWW',
                        'WWW_HELP' => 'Automatically link any hostname that starts with \'www.\' as external',
                        'SCHEMES' => 'Allowed schemes',
                        'SCHEMES_HELP' => 'List of allowed schemes'
                    ],
                    'PROCESS' => 'Filter external links on the page',
                    'TITLE' => 'Show default title for external links',
                    'TITLE_MESSAGE' => 'This link will take you to an external web site. We are not responsible for their content.',
                    'NO_FOLLOW' => 'Add <code>rel="nofollow"</code> to all external links',
                    'TARGET' => 'Set target attribute of the link.',
                    'TARGET_BLANK' => '_blank | Load in a new window',
                    'TARGET_SELF' => '_self | Load in the same frame as it was clicked',
                    'TARGET_PARENT' => '_parent | Load in the parent frameset',
                    'TARGET_TOP' => '_top | Load in the full body of the window',
                    'MODE' => 'Mode',
                    'MODE_HELP' => 'active = process and parse all links; passive = parse links, but don\'t set CSS classes',
                    'MODE_ACTIVE' => 'Active - Process and parse all links',
                    'MODE_PASSIVE' => 'Passive - Parse links, but don\'t set CSS classes'
                ]
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Search...',
                'SEARCH_RESULTS' => 'Search Results',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Query: <strong>%s</strong> found one result',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Query: <strong>%s</strong> found %s results',
                'SEARCH_FIELD_MINIMUM_CHARACTERS' => 'Please add at least %s characters'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Error: Invalid Frontmatter

Path: `%2$s`

**%3$s**

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en',
                '/([m|l])ouse$/i' => '\\1ice',
                '/(matr|vert|ind)ix|ex$/i' => '\\1ices',
                '/(x|ch|ss|sh)$/i' => '\\1es',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([^aeiouy]|qu)y$/i' => '\\1ies',
                '/(hive)$/i' => '\\1s',
                '/(?:([^f])fe|([lr])f)$/i' => '\\1\\2ves',
                '/sis$/i' => 'ses',
                '/([ti])um$/i' => '\\1a',
                '/(buffal|tomat)o$/i' => '\\1oes',
                '/(bu)s$/i' => '\\1ses',
                '/(alias|status)/i' => '\\1es',
                '/(octop|vir)us$/i' => '\\1i',
                '/(ax|test)is$/i' => '\\1es',
                '/s$/i' => 's',
                '/$/' => 's'
            ],
            'INFLECTOR_SINGULAR' => [
                '/(quiz)zes$/i' => '\\1',
                '/(matr)ices$/i' => '\\1ix',
                '/(vert|ind)ices$/i' => '\\1ex',
                '/^(ox)en/i' => '\\1',
                '/(alias|status)es$/i' => '\\1',
                '/([octop|vir])i$/i' => '\\1us',
                '/(cris|ax|test)es$/i' => '\\1is',
                '/(shoe)s$/i' => '\\1',
                '/(o)es$/i' => '\\1',
                '/(bus)es$/i' => '\\1',
                '/([m|l])ice$/i' => '\\1ouse',
                '/(x|ch|ss|sh)es$/i' => '\\1',
                '/(m)ovies$/i' => '\\1ovie',
                '/(s)eries$/i' => '\\1eries',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([lr])ves$/i' => '\\1f',
                '/(tive)s$/i' => '\\1',
                '/(hive)s$/i' => '\\1',
                '/([^f])ves$/i' => '\\1fe',
                '/(^analy)ses$/i' => '\\1sis',
                '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2sis',
                '/([ti])a$/i' => '\\1um',
                '/(n)ews$/i' => '\\1ews',
                '/s$/i' => ''
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'equipment',
                1 => 'information',
                2 => 'rice',
                3 => 'money',
                4 => 'species',
                5 => 'series',
                6 => 'fish',
                7 => 'sheep'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'people',
                'man' => 'men',
                'child' => 'children',
                'sex' => 'sexes',
                'move' => 'moves'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => 'th',
                'first' => 'st',
                'second' => 'nd',
                'third' => 'rd'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'No date provided',
                'BAD_DATE' => 'Bad date',
                'AGO' => 'ago',
                'FROM_NOW' => 'from now',
                'JUST_NOW' => 'just now',
                'SECOND' => 'second',
                'MINUTE' => 'minute',
                'HOUR' => 'hour',
                'DAY' => 'day',
                'WEEK' => 'week',
                'MONTH' => 'month',
                'YEAR' => 'year',
                'DECADE' => 'decade',
                'SEC' => 'sec',
                'MIN' => 'min',
                'HR' => 'hr',
                'WK' => 'wk',
                'MO' => 'mo',
                'YR' => 'yr',
                'DEC' => 'dec',
                'SECOND_PLURAL' => 'seconds',
                'MINUTE_PLURAL' => 'minutes',
                'HOUR_PLURAL' => 'hours',
                'DAY_PLURAL' => 'days',
                'WEEK_PLURAL' => 'weeks',
                'MONTH_PLURAL' => 'months',
                'YEAR_PLURAL' => 'years',
                'DECADE_PLURAL' => 'decades',
                'SEC_PLURAL' => 'secs',
                'MIN_PLURAL' => 'mins',
                'HR_PLURAL' => 'hrs',
                'WK_PLURAL' => 'wks',
                'MO_PLURAL' => 'mos',
                'YR_PLURAL' => 'yrs',
                'DEC_PLURAL' => 'decs'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validation failed:</b>',
                'INVALID_INPUT' => 'Invalid input in',
                'MISSING_REQUIRED_FIELD' => 'Missing required field:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'January',
                1 => 'February',
                2 => 'March',
                3 => 'April',
                4 => 'May',
                5 => 'June',
                6 => 'July',
                7 => 'August',
                8 => 'September',
                9 => 'October',
                10 => 'November',
                11 => 'December'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Monday',
                1 => 'Tuesday',
                2 => 'Wednesday',
                3 => 'Thursday',
                4 => 'Friday',
                5 => 'Saturday',
                6 => 'Sunday'
            ]
        ],
        'de' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Fehler',
                'ERROR_MESSAGE' => 'Uuups. Sieht aus als ob diese Seite nicht existiert.'
            ],
            'PLUGINS' => [
                'EXTERNAL_LINKS' => [
                    'PLUGIN_NAME' => 'External Links',
                    'PLUGIN_STATUS' => 'Plugin Status',
                    'PLUGIN_STATUS_HELP' => 'Aktiviere das Plugin oder schalte es komplett ab.',
                    'BUILTIN_CSS' => 'Verwende mitgeliefertes CSS',
                    'WEIGHT' => 'Ausführungsreihenfolge',
                    'SETTINGS' => 'Einstellungen',
                    'CONTENT' => 'Inhalt',
                    'EXCLUDE' => [
                        'SECTION' => 'Ausnahmen',
                        'SECTION_HELP' => 'Setzt Links mit bestimmten Klassen oder Links von bestimmten Domains immer als intern.',
                        'CLASSES' => 'Ignoriere Links mit diesen Klassen',
                        'CLASSES_HELP' => 'Komma getrennte Liste',
                        'DOMAINS' => 'Eine Liste von auszuschließenden Domains',
                        'DOMAINS_HELP' => 'Komma getrennte Liste von Domains z.B. _localhost/*_ (jeder regulärer Ausdruck kann verwendet werden)'
                    ],
                    'LINKS' => [
                        'SECTION' => 'Links',
                        'SECTION_HELP' => 'Sieht Links beginnend mit <code>www.</code> oder mit als extern markierten Protokollen als extern an.',
                        'WWW' => 'Verlinkung (WWW)',
                        'WWW_HELP' => 'Verlinke auch Links, die mit \'www.\' beginnen als extern',
                        'SCHEMES' => 'Erlaubte Protokolle',
                        'SCHEMES_HELP' => 'Liste von erlaubten Protokollen'
                    ],
                    'PROCESS' => 'Aktiviere <code>External Links</code> auf Seite',
                    'TITLE' => 'Zeige Standardtexttitel für externe Links',
                    'TITLE_MESSAGE' => 'Dieser Link führt auf eine externe Webseite für deren Inhalt wir nicht verantwortlich sind.',
                    'NO_FOLLOW' => 'Fügt <code>rel="nofollow"</code> zu allen externen Links',
                    'TARGET' => 'Setze "target" Attribut des Links.',
                    'TARGET_BLANK' => '_blank - Öffne Link im neuen Fenster',
                    'TARGET_SELF' => '_self - Öffne Link im gleichen Tab oder Seite',
                    'TARGET_PARENT' => '_parent - Öffne Link im Elternfenster',
                    'TARGET_TOP' => '_top - Öffne Link im ganzen Fenster',
                    'MODE' => 'Modus',
                    'MODE_HELP' => 'active = Zeichne externe Links aus; passive = Zeichne externe Links aus ohne entsprechende CSS-Klassen zu setzen',
                    'MODE_ACTIVE' => 'Aktiv - Zeichne externe Links aus',
                    'MODE_PASSIVE' => 'Passiv - Zeichne externe Links aus ohne entsprechende CSS-Klassen zu setzen'
                ]
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Suche...',
                'SEARCH_RESULTS' => 'Suchergebnisse',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Suche: <strong>%s</strong> fand ein Ergebnis',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Suche: <strong>%s</strong> fand %s Ergebnisse'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---
# Fehler: Frontmatter enthält Fehler

Pfad: `%2$s`

**%3$s ** 

```
%4$s
```
',
            'INFLECTOR_UNCOUNTABLE' => [
                1 => 'Informationen',
                2 => 'Reis',
                3 => 'Geld'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'Personen',
                'man' => 'Menschen',
                'child' => 'Kinder',
                'sex' => 'Geschlecht',
                'move' => 'Züge'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => '.',
                'first' => '.',
                'second' => '.',
                'third' => '.'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Kein Datum angegeben',
                'BAD_DATE' => 'Falsches Datum',
                'AGO' => 'her',
                'FROM_NOW' => 'ab jetzt',
                'SECOND' => 'Sekunde',
                'MINUTE' => 'Minute',
                'HOUR' => 'Stunde',
                'DAY' => 'Tag',
                'WEEK' => 'Woche',
                'MONTH' => 'Monat',
                'YEAR' => 'Jahr',
                'DECADE' => 'Jahrzehnt',
                'SEC' => 'Sek.',
                'MIN' => 'Min.',
                'HR' => 'Std.',
                'WK' => 'Wo.',
                'MO' => 'Mo.',
                'YR' => 'J.',
                'DEC' => 'Dek.',
                'SECOND_PLURAL' => 'Sekunden',
                'MINUTE_PLURAL' => 'Minuten',
                'HOUR_PLURAL' => 'Stunden',
                'DAY_PLURAL' => 'Tage',
                'WEEK_PLURAL' => 'Wochen',
                'MONTH_PLURAL' => 'Monate',
                'YEAR_PLURAL' => 'Jahre',
                'DECADE_PLURAL' => 'Jahrzehnte',
                'SEC_PLURAL' => 'Sekunden',
                'MIN_PLURAL' => 'Minuten',
                'HR_PLURAL' => 'Stunden',
                'WK_PLURAL' => 'Wochen',
                'MO_PLURAL' => 'Monate',
                'YR_PLURAL' => 'Jahre',
                'DEC_PLURAL' => 'Jahrzehnten'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Überprüfung fehlgeschlagen:</b>',
                'INVALID_INPUT' => 'Ungültige Eingabe in',
                'MISSING_REQUIRED_FIELD' => 'Erforderliches Feld fehlt:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Januar',
                1 => 'Februar',
                2 => 'März',
                3 => 'April',
                4 => 'Mai',
                5 => 'Juni',
                6 => 'Juli',
                7 => 'August',
                8 => 'September',
                9 => 'Oktober',
                10 => 'November',
                11 => 'Dezember'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Montag',
                1 => 'Dienstag',
                2 => 'Mittwoch',
                3 => 'Donnerstag',
                4 => 'Freitag',
                5 => 'Samstag',
                6 => 'Sonntag'
            ]
        ],
        'hr' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Greška',
                'ERROR_MESSAGE' => 'Uups. Izgleda da ova stranica ne postoji.'
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Traži...',
                'SEARCH_RESULTS' => 'Rezultati pretrage',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Upit: <strong>%s</strong> je pronašao jedan rezultat',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Upit: <strong>%s</strong> je pronašao %s rezultata'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'oprema',
                1 => 'informacije',
                2 => 'riža',
                3 => 'novac',
                4 => 'vrsta',
                5 => 'serija',
                6 => 'riba',
                7 => 'ovca'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'osobe',
                'man' => 'ljudi',
                'child' => 'djeca',
                'sex' => 'spolovi',
                'move' => 'Pomakni'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Datum nije upisan',
                'BAD_DATE' => 'Pogrešan datum',
                'AGO' => 'prije',
                'FROM_NOW' => 'od sada',
                'SECOND' => 'sekunda',
                'MINUTE' => 'minuta',
                'HOUR' => 'sat',
                'DAY' => 'dan',
                'WEEK' => 'tjedan',
                'MONTH' => 'mjesec',
                'YEAR' => 'godina',
                'DECADE' => 'desetljeće',
                'SEC' => 'sek',
                'HR' => 'sat',
                'WK' => 't',
                'MO' => 'm',
                'YR' => 'g',
                'DEC' => 'des',
                'SECOND_PLURAL' => 'sekundi',
                'MINUTE_PLURAL' => 'minuta',
                'HOUR_PLURAL' => 'sati',
                'DAY_PLURAL' => 'dan',
                'WEEK_PLURAL' => 'tjedana',
                'MONTH_PLURAL' => 'mjeseci',
                'YEAR_PLURAL' => 'godina',
                'DECADE_PLURAL' => 'desetljeća',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'sat',
                'WK_PLURAL' => 't',
                'MO_PLURAL' => 'm',
                'YR_PLURAL' => 'g',
                'DEC_PLURAL' => 'des'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validacija nije uspjela:</b>',
                'INVALID_INPUT' => 'Pogrešan unos u',
                'MISSING_REQUIRED_FIELD' => 'Nedostaje obavezno polje:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Siječanj',
                1 => 'Veljača',
                2 => 'Ožujak',
                3 => 'Travanj',
                4 => 'Svibanj',
                5 => 'Lipanj',
                6 => 'Srpanj',
                7 => 'Kolovoz',
                8 => 'Rujan',
                9 => 'Listopad',
                10 => 'Studeni',
                11 => 'Prosinac'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Ponedjeljak',
                1 => 'Utorak',
                2 => 'Srijeda',
                3 => 'Četvrtak',
                4 => 'Petak',
                5 => 'Subota',
                6 => 'Nedjelja'
            ]
        ],
        'ro' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Eroare',
                'ERROR_MESSAGE' => 'Ooops. Se pare că pagina nu există.'
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Caută...',
                'SEARCH_RESULTS' => 'Rezultatele căutării',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Căutarea: <strong>%s</strong> a găsit un rezultat',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Căutarea: <strong>%s</strong> a găsit %s rezultate'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
Titlu: %1$s
---
# Eroare: Frontmatter este invalid

Calea: `%2$s`

**%3$s**

```
%4$s
',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en',
                '/([m|l])ouse$/i' => '\\1ice',
                '/(matr|vert|ind)ix|ex$/i' => '\\1ices',
                '/(x|ch|ss|sh)$/i' => '\\1es',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([^aeiouy]|qu)y$/i' => '\\1ies',
                '/(hive)$/i' => '\\1s',
                '/(?:([^f])fe|([lr])f)$/i' => '\\1\\2ves',
                '/sis$/i' => 'ses',
                '/([ti])um$/i' => '\\1a',
                '/(buffal|tomat)o$/i' => '\\1oes'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'echipament',
                1 => 'informaţie',
                2 => 'orez',
                3 => 'bani',
                4 => 'specii',
                5 => 'serii',
                6 => 'peşte',
                7 => 'oaie'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'persoane',
                'man' => 'bărbați',
                'child' => 'copii',
                'sex' => 'sexe',
                'move' => 'mutări'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Nu există o dată prevăzută',
                'BAD_DATE' => 'Dată incorectă',
                'AGO' => 'în urmă',
                'FROM_NOW' => 'de acum',
                'SECOND' => 'secundă',
                'MINUTE' => 'minut',
                'HOUR' => 'oră',
                'DAY' => 'zi',
                'WEEK' => 'săptămână',
                'MONTH' => 'lună',
                'YEAR' => 'an',
                'DECADE' => 'decadă',
                'SEC' => 'sec',
                'MIN' => 'min',
                'HR' => 'oră',
                'WK' => 'săpt',
                'MO' => 'lună',
                'YR' => 'an',
                'DEC' => 'decadă',
                'SECOND_PLURAL' => 'secunde',
                'MINUTE_PLURAL' => 'minute',
                'HOUR_PLURAL' => 'ore',
                'DAY_PLURAL' => 'zile',
                'WEEK_PLURAL' => 'săptămâni',
                'MONTH_PLURAL' => 'luni',
                'YEAR_PLURAL' => 'ani',
                'DECADE_PLURAL' => 'decade',
                'SEC_PLURAL' => 'sec',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'ore',
                'WK_PLURAL' => 'săpt',
                'MO_PLURAL' => 'luni',
                'YR_PLURAL' => 'ani',
                'DEC_PLURAL' => 'decenii'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validare nereușită</b>',
                'INVALID_INPUT' => 'Date incorecte în',
                'MISSING_REQUIRED_FIELD' => 'Câmp obligatoriu lipsă:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Ianuarie',
                1 => 'Februarie',
                2 => 'Martie',
                3 => 'Aprilie',
                4 => 'Mai',
                5 => 'Iunie',
                6 => 'Iulie',
                7 => 'August',
                8 => 'Septembrie',
                9 => 'Octombrie',
                10 => 'Noiembrie',
                11 => 'Decembrie'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Luni',
                1 => 'Marți',
                2 => 'Miercuri',
                3 => 'Joi',
                4 => 'Vineri',
                5 => 'Sâmbătă',
                6 => 'Duminică'
            ]
        ],
        'fr' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Erreur',
                'ERROR_MESSAGE' => 'Oups. Il semble que cette page n’existe pas.'
            ],
            'PLUGINS' => [
                'EXTERNAL_LINKS' => [
                    'PLUGIN_NAME' => 'Liens externes',
                    'PLUGIN_STATUS' => 'Statut du plugin',
                    'STATUS_HELP' => 'Set to false to disable this plugin completely.',
                    'BUILTIN_CSS' => 'Utiliser les CSS intégrés',
                    'WEIGHT' => 'Ordre d\'exécution',
                    'SETTINGS' => 'Configuration',
                    'CONTENT' => 'Contenu',
                    'EXCLUDE' => [
                        'SECTION' => 'Exclusion',
                        'SECTION_HELP' => 'Exclure les liens avec des classes spécifiques ou des domaines comme étant reconnus comme liens externes.',
                        'CLASSES' => 'Exclure tous les liens avec cette classe',
                        'CLASSES_HELP' => 'Liste des classes séparées par des virgules.',
                        'DOMAINS' => 'Une liste des domaines à exclure',
                        'DOMAINS_HELP' => 'Liste des domaines séparés par des virgules ex : _localhost/*_  (les expressions régulières peuvent être utilisées)'
                    ],
                    'LINKS' => [
                        'SECTION' => 'Liens',
                        'SECTION_HELP' => 'Définir les liens commençant par <code>www.</code> et ceux de la liste des schémas définis comme étant des liens externes.',
                        'WWW' => 'Liens WWW',
                        'WWW_HELP' => 'Reconnaître automatiquement tout lien commencant par \'www.\' comme étant un lien externe.',
                        'SCHEMES' => 'Schémas autorisés',
                        'SCHEMES_HELP' => 'Liste des schémas autorisés'
                    ],
                    'PROCESS' => 'Filtrer les liens externes de la page',
                    'TITLE' => 'Afficher le titre par défaut pour les liens externes',
                    'TITLE_MESSAGE' => 'Ce lien va vous diriger vers un site externe. Nous ne sommes pas responsables de son contenu.',
                    'NO_FOLLOW' => 'Ajouter <code>rel="nofollow"</code> à tous les liens externes',
                    'TARGET' => 'Spécifier la cible dans laquelle le contenu du lien doit s\'afficher.',
                    'TARGET_BLANK' => '_blank | Afficher dans une nouvelle fenêtre',
                    'TARGET_SELF' => '_self | Afficher dans la même fenêtre',
                    'TARGET_PARENT' => '_parent | Afficher dans le cadre parent (frame)',
                    'TARGET_TOP' => '_top | Afficher dans le cadre racine',
                    'MODE' => 'Mode',
                    'MODE_HELP' => 'actif = analyser et procéder pour tous les liens; passif = analyser les liens mais ne pas appliquer les classes CSS',
                    'MODE_ACTIVE' => 'Actif - Analyser et procéder pour tous les liens',
                    'MODE_PASSIVE' => 'Passif - Analyser les liens mais ne pas appliquer les classes CSS'
                ]
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Recherche...',
                'SEARCH_RESULTS' => 'Résultats de la recherche',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Recherche : Un résultat trouvé pour <strong>%s</strong>',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Recherche : %2$s résultats trouvés pour <strong>%1$s</strong>'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Erreur : Frontmatter invalide

Path: `%2$s`

**%3$s**

```
%4$s
```
',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en',
                '/([m|l])ouse$/i' => '\\1ice',
                '/(matr|vert|ind)ix|ex$/i' => '\\1ices',
                '/(x|ch|ss|sh)$/i' => '\\1es',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([^aeiouy]|qu)y$/i' => '\\1ies',
                '/(hive)$/i' => '\\1s',
                '/(?:([^f])fe|([lr])f)$/i' => '\\1\\2ves',
                '/sis$/i' => 'ses',
                '/([ti])um$/i' => '\\1a',
                '/(buffal|tomat)o$/i' => '\\1oes',
                '/(bu)s$/i' => '\\1ses',
                '/(alias|status)/i' => '\\1es',
                '/(octop|vir)us$/i' => '\\1i',
                '/(ax|test)is$/i' => '\\1es',
                '/s$/i' => 's',
                '/$/' => 's'
            ],
            'INFLECTOR_SINGULAR' => [
                '/(quiz)zes$/i' => '\\1',
                '/(matr)ices$/i' => '\\1ix',
                '/(vert|ind)ices$/i' => '\\1ex',
                '/^(ox)en/i' => '\\1',
                '/(alias|status)es$/i' => '\\1',
                '/([octop|vir])i$/i' => '\\1us',
                '/(cris|ax|test)es$/i' => '\\1is',
                '/(shoe)s$/i' => '\\1',
                '/(o)es$/i' => '\\1',
                '/(bus)es$/i' => '\\1',
                '/([m|l])ice$/i' => '\\1ouse',
                '/(x|ch|ss|sh)es$/i' => '\\1',
                '/(m)ovies$/i' => '\\1ovie',
                '/(s)eries$/i' => '\\1eries',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([lr])ves$/i' => '\\1f',
                '/(tive)s$/i' => '\\1',
                '/(hive)s$/i' => '\\1',
                '/([^f])ves$/i' => '\\1fe',
                '/(^analy)ses$/i' => '\\1sis',
                '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2sis',
                '/([ti])a$/i' => '\\1um',
                '/(n)ews$/i' => '\\1ews'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'équipement',
                1 => 'informations',
                2 => 'riz',
                3 => 'argent',
                4 => 'espèces',
                5 => 'séries',
                6 => 'poisson',
                7 => 'mouton'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'personnes',
                'man' => 'hommes',
                'child' => 'enfants',
                'sex' => 'sexes',
                'move' => 'déplacements'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => 'ème',
                'first' => 'er',
                'second' => 'ème',
                'third' => 'ème'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Aucune date fournie',
                'BAD_DATE' => 'Date erronée',
                'AGO' => 'plus tôt',
                'FROM_NOW' => 'à partir de maintenant',
                'SECOND' => 'seconde',
                'MINUTE' => 'minute',
                'HOUR' => 'heure',
                'DAY' => 'jour',
                'WEEK' => 'semaine',
                'MONTH' => 'mois',
                'YEAR' => 'année',
                'DECADE' => 'décennie',
                'SEC' => 's',
                'MIN' => 'm',
                'HR' => 'h',
                'WK' => 'sem',
                'MO' => 'm',
                'YR' => 'an',
                'DEC' => 'déc',
                'SECOND_PLURAL' => 'secondes',
                'MINUTE_PLURAL' => 'minutes',
                'HOUR_PLURAL' => 'heures',
                'DAY_PLURAL' => 'jours',
                'WEEK_PLURAL' => 'semaines',
                'MONTH_PLURAL' => 'mois',
                'YEAR_PLURAL' => 'années',
                'DECADE_PLURAL' => 'décennies',
                'SEC_PLURAL' => 's',
                'MIN_PLURAL' => 'm',
                'HR_PLURAL' => 'h',
                'WK_PLURAL' => 'sem',
                'MO_PLURAL' => 'mois',
                'YR_PLURAL' => 'a',
                'DEC_PLURAL' => 'décs'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>La validation a échoué :</b>',
                'INVALID_INPUT' => 'Saisie non valide',
                'MISSING_REQUIRED_FIELD' => 'Champ obligatoire manquant :'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Janvier',
                1 => 'Février',
                2 => 'Mars',
                3 => 'Avril',
                4 => 'Mai',
                5 => 'Juin',
                6 => 'Juillet',
                7 => 'Août',
                8 => 'Septembre',
                9 => 'Octobre',
                10 => 'Novembre',
                11 => 'Décembre'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Lundi',
                1 => 'Mardi',
                2 => 'Mercredi',
                3 => 'Jeudi',
                4 => 'Vendredi',
                5 => 'Samedi',
                6 => 'Dimanche'
            ]
        ],
        'it' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Errore',
                'ERROR_MESSAGE' => 'Ooops. A quanto pare, questa pagina non esiste.'
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Cerca...',
                'SEARCH_RESULTS' => 'Risultati della ricerca',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Ricerca: <strong>%s</strong>. Trovato un risultato',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Ricerca: <strong>%s</strong>. Trovati %s risultati',
                'SEARCH_FIELD_MINIMUM_CHARACTERS' => 'Inserisci almeno %s caratteri'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---Titolo: %1$s---# Errore: Frontmatter non valido: \'%2$s\' * *%3$s * * \' \'%4$s \' \'',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Nessuna data fornita',
                'BAD_DATE' => 'Data non valida',
                'AGO' => 'fa',
                'FROM_NOW' => 'da adesso',
                'SECOND' => 'secondo',
                'MINUTE' => 'minuto',
                'HOUR' => 'ora',
                'DAY' => 'giorno',
                'WEEK' => 'settimana',
                'MONTH' => 'mese',
                'YEAR' => 'anno',
                'DECADE' => 'decennio',
                'SEC' => 'sec',
                'MIN' => 'min',
                'HR' => 'ora',
                'WK' => 'settimana',
                'MO' => 'mese',
                'YR' => 'anno',
                'DEC' => 'decennio',
                'SECOND_PLURAL' => 'secondi',
                'MINUTE_PLURAL' => 'minuti',
                'HOUR_PLURAL' => 'ore',
                'DAY_PLURAL' => 'giorni',
                'WEEK_PLURAL' => 'settimane',
                'MONTH_PLURAL' => 'mesi',
                'YEAR_PLURAL' => 'anni',
                'DECADE_PLURAL' => 'decadi',
                'SEC_PLURAL' => 'secondi',
                'MIN_PLURAL' => 'minuti',
                'HR_PLURAL' => 'ore',
                'WK_PLURAL' => 'settimane',
                'MO_PLURAL' => 'mesi',
                'YR_PLURAL' => 'anni',
                'DEC_PLURAL' => 'decenni'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validazione fallita:</b>',
                'INVALID_INPUT' => 'Input non valido in',
                'MISSING_REQUIRED_FIELD' => 'Campo richiesto mancante:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Gennaio',
                1 => 'Febbraio',
                2 => 'Marzo',
                3 => 'Aprile',
                4 => 'Maggio',
                5 => 'Giugno',
                6 => 'Luglio',
                7 => 'Agosto',
                8 => 'Settembre',
                9 => 'Ottobre',
                10 => 'Novembre',
                11 => 'Dicembre'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Lunedì',
                1 => 'Martedì',
                2 => 'Mercoledì',
                3 => 'Giovedì',
                4 => 'Venerdì',
                5 => 'Sabato',
                6 => 'Domenica'
            ]
        ],
        'ru' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Ошибка',
                'ERROR_MESSAGE' => 'Упс. Похоже, этой страницы не существует.'
            ],
            'PLUGINS' => [
                'EXTERNAL_LINKS' => [
                    'PLUGIN_NAME' => 'Внешние ссылки',
                    'PLUGIN_STATUS' => 'Статус плагина',
                    'STATUS_HELP' => 'Установите нет, чтобы отключить этот плагин полностью.',
                    'BUILTIN_CSS' => 'Использовать встроенные CSS',
                    'WEIGHT' => 'Порядок выполнения',
                    'SETTINGS' => 'Настройки',
                    'CONTENT' => 'Контент',
                    'EXCLUDE' => [
                        'SECTION' => 'Исключения',
                        'SECTION_HELP' => 'Исключить ссылки с определенным классом или домены, которые не признаются в качестве внешних ссылок.',
                        'CLASSES' => 'Исключить все ссылки с этим классом',
                        'CLASSES_HELP' => 'Список разделенных запятыми.',
                        'DOMAINS' => 'Список доменов, которые будут исключены',
                        'DOMAINS_HELP' => 'Разделенный запятыми список доменов, например, _localhost / * _ (любое регулярное выражение может быть использовано)'
                    ],
                    'LINKS' => [
                        'SECTION' => 'Ссылки',
                        'SECTION_HELP' => 'Установить ссылки, начинающиеся с <code>www.</code>? и список разрешенных схем, как внешние.',
                        'WWW' => 'Ссылка WWW',
                        'WWW_HELP' => 'Автоматически связывать любое имя хоста, которое начинается с \'www\'. как внешние',
                        'SCHEMES' => 'Допустимые схемы',
                        'SCHEMES_HELP' => 'Список допустимых схем'
                    ],
                    'PROCESS' => 'Фильтр внешних ссылок на странице',
                    'TITLE' => 'Показать название по умолчанию для внешних ссылок',
                    'TITLE_MESSAGE' => 'Эта ссылка приведет вас на внешний веб-сайт. Мы не несем ответственности за его содержание.',
                    'NO_FOLLOW' => 'Добавить <code>rel="nofollow"</code> ко всем внешним ссылкам',
                    'TARGET' => 'Установить целевой атрибут ссылки.',
                    'TARGET_BLANK' => '_blank | Загрузка в новом окне',
                    'TARGET_SELF' => '_self | Загрузка в том же фрейме где и был сделан клик',
                    'TARGET_PARENT' => '_parent | Загрузка в родительском наборе фреймов',
                    'TARGET_TOP' => '_top | Загрузка в отдельном окне браузера',
                    'MODE' => 'Режим',
                    'MODE_HELP' => 'активный = обработка и разбор всех ссылок; пассивный = вставлять ссылки, но не устанавливать для них CSS',
                    'MODE_ACTIVE' => 'Активный = обработка и разбор всех ссылок',
                    'MODE_PASSIVE' => 'Пассивный = вставлять ссылки, но не устанавливать для них CSS'
                ]
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Найти...',
                'SEARCH_RESULTS' => 'Результат поиска',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'По запросу: <strong>%s</strong> результатов найдено 1',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'По запросу: <strong>%s</strong> результатов найдено %s'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Ошибка: Недопустимое содержимое

Path: `%2$s`

**%3$s**

```
%4$s
```
',
            'INFLECTOR_IRREGULAR' => [
                'person' => 'люди',
                'man' => 'человек',
                'child' => 'ребенок',
                'sex' => 'пол',
                'move' => 'движется'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Дата не указана',
                'BAD_DATE' => 'Неверная дата',
                'AGO' => 'назад',
                'FROM_NOW' => 'теперь',
                'SECOND' => 'секунда',
                'MINUTE' => 'минута',
                'HOUR' => 'час',
                'DAY' => 'д',
                'WEEK' => 'неделя',
                'MONTH' => 'месяц',
                'YEAR' => 'год',
                'DECADE' => 'десятилетие',
                'SEC' => 'с',
                'MIN' => 'мин',
                'HR' => 'ч',
                'WK' => 'нед.',
                'MO' => 'мес.',
                'YR' => 'г.',
                'DEC' => 'гг.',
                'SECOND_PLURAL' => 'секунды',
                'MINUTE_PLURAL' => 'минуты',
                'HOUR_PLURAL' => 'часы',
                'DAY_PLURAL' => 'д',
                'WEEK_PLURAL' => 'недели',
                'MONTH_PLURAL' => 'месяцы',
                'YEAR_PLURAL' => 'годы',
                'DECADE_PLURAL' => 'десятилетия',
                'SEC_PLURAL' => 'с',
                'MIN_PLURAL' => 'мин',
                'HR_PLURAL' => 'ч',
                'WK_PLURAL' => 'нед',
                'MO_PLURAL' => 'мес',
                'YR_PLURAL' => 'г.',
                'DEC_PLURAL' => 'гг.'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Проверка не удалась:</b>',
                'INVALID_INPUT' => 'Неверный ввод в',
                'MISSING_REQUIRED_FIELD' => 'Отсутствует необходимое поле:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Январь',
                1 => 'Февраль',
                2 => 'Март',
                3 => 'Апрель',
                4 => 'Май',
                5 => 'Июнь',
                6 => 'Июль',
                7 => 'Август',
                8 => 'Сентябрь',
                9 => 'Октябрь',
                10 => 'Ноябрь',
                11 => 'Декабрь'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Понедельник',
                1 => 'Вторник',
                2 => 'Среда',
                3 => 'Четверг',
                4 => 'Пятница',
                5 => 'Суббота',
                6 => 'Воскресенье'
            ]
        ],
        'da' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Fejl',
                'ERROR_MESSAGE' => 'Ups. Det ser ud til at siden ikke eksisterer.'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
Titel: %1$s
---

# Fejl: Ugyldigt frontmatter

Sti: `%2$s`

**%3$s**

```
%4$s
```
',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Ingen dato angivet',
                'BAD_DATE' => 'Ugyldig dato',
                'AGO' => 'siden',
                'FROM_NOW' => 'fra nu',
                'SECOND' => 'sekund',
                'MINUTE' => 'minut',
                'HOUR' => 'time',
                'DAY' => 'dag',
                'WEEK' => 'uge',
                'MONTH' => 'måned',
                'YEAR' => 'år',
                'DECADE' => 'årti',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 't',
                'WK' => 'u',
                'MO' => 'md',
                'YR' => 'år',
                'DEC' => 'årti',
                'SECOND_PLURAL' => 'sekunder',
                'MINUTE_PLURAL' => 'minutter',
                'HOUR_PLURAL' => 'timer',
                'DAY_PLURAL' => 'dage',
                'WEEK_PLURAL' => 'uger',
                'MONTH_PLURAL' => 'måneder',
                'YEAR_PLURAL' => 'år',
                'DECADE_PLURAL' => 'årtier',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'timer',
                'WK_PLURAL' => 'uger',
                'MO_PLURAL' => 'mdr',
                'YR_PLURAL' => 'år',
                'DEC_PLURAL' => 'årtier'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validering mislykkedes:</b>',
                'INVALID_INPUT' => 'Ugyldigt input i',
                'MISSING_REQUIRED_FIELD' => 'Mangler obligatorisk felt:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Januar',
                1 => 'Februar',
                2 => 'Marts',
                3 => 'April',
                4 => 'Maj',
                5 => 'Juni',
                6 => 'Juli',
                7 => 'August',
                8 => 'September',
                9 => 'Oktober',
                10 => 'November',
                11 => 'December'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Mandag',
                1 => 'Tirsdag',
                2 => 'Onsdag',
                3 => 'Torsdag',
                4 => 'Fredag',
                5 => 'Lørdag',
                6 => 'Søndag'
            ]
        ],
        'zh' => [
            'PLUGIN_ERROR' => [
                'ERROR' => '错误',
                'ERROR_MESSAGE' => '呃，似乎这个页面不存在。'
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => '搜索...',
                'SEARCH_RESULTS' => '搜索结果',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => '查询: <strong>%s</strong> 找到 1 个结果',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => '查询: <strong>%s</strong> 找到 %s 个结果'
            ]
        ],
        'cs' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Chyba',
                'ERROR_MESSAGE' => 'A jéje. Vypadá to, že hledaná stránka tu není.'
            ],
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Vyhledat...',
                'SEARCH_RESULTS' => 'Výsledky hledání',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Hledání výrazu \'<strong>%s</strong>\' našlo jeden výsledek',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Hledání výrazu \'<strong>%s</strong>\' našlo %s výsledků'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'vybavení',
                1 => 'informace',
                2 => 'rýže',
                3 => 'peníze',
                4 => 'druhy',
                5 => 'série',
                6 => 'ryba',
                7 => 'ovce'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'lidé',
                'man' => 'muži',
                'child' => 'děti',
                'sex' => 'pohlaví',
                'move' => 'pohyby'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => '.',
                'first' => '.',
                'second' => '.',
                'third' => '.'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Datum nebylo vloženo',
                'BAD_DATE' => 'Chybné datum',
                'AGO' => 'zpět',
                'FROM_NOW' => 'od teď',
                'SECOND' => 'sekunda',
                'MINUTE' => 'minuta',
                'HOUR' => 'hodina',
                'DAY' => 'den',
                'WEEK' => 'týden',
                'MONTH' => 'měsíc',
                'YEAR' => 'rok',
                'DECADE' => 'dekáda',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 'hod',
                'WK' => 't',
                'MO' => 'm',
                'YR' => 'r',
                'DEC' => 'dek',
                'SECOND_PLURAL' => 'sekundy',
                'MINUTE_PLURAL' => 'minuty',
                'HOUR_PLURAL' => 'hodiny',
                'DAY_PLURAL' => 'dny',
                'WEEK_PLURAL' => 'týdny',
                'MONTH_PLURAL' => 'měsíce',
                'YEAR_PLURAL' => 'roky',
                'DECADE_PLURAL' => 'dekády',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'hod',
                'WK_PLURAL' => 't',
                'MO_PLURAL' => 'm',
                'YR_PLURAL' => 'r',
                'DEC_PLURAL' => 'dek'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Ověření se nezdařilo:</b>',
                'INVALID_INPUT' => 'Neplatný vstup v',
                'MISSING_REQUIRED_FIELD' => 'Chybí požadované pole:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'ledna',
                1 => 'února',
                2 => 'března',
                3 => 'dubna',
                4 => 'května',
                5 => 'června',
                6 => 'července',
                7 => 'srpna',
                8 => 'září',
                9 => 'října',
                10 => 'listopadu',
                11 => 'prosince'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Pondělí',
                1 => 'Úterý',
                2 => 'Středa',
                3 => 'Čtvrtek',
                4 => 'Pátek',
                5 => 'Sobota',
                6 => 'Neděle'
            ]
        ],
        'pl' => [
            'PLUGIN_ERROR' => [
                'ERROR' => 'Błąd',
                'ERROR_MESSAGE' => 'Ups. Wygląda na to, że ta strona nie istnieje.'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Error: Nieprawidłowy Frontmatter

Path: `%2$s`

**%3$s**

```
%4$s
```
',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Nie podano daty',
                'BAD_DATE' => 'Zła data',
                'AGO' => 'temu',
                'FROM_NOW' => 'od teraz',
                'SECOND' => 'sekunda',
                'MINUTE' => 'minuta',
                'HOUR' => 'godzina',
                'DAY' => 'dzień',
                'WEEK' => 'tydzień',
                'MONTH' => 'miesiąc',
                'YEAR' => 'rok',
                'DECADE' => 'dekada',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 'godz',
                'WK' => 'tydz',
                'MO' => 'm-c',
                'YR' => 'rok',
                'DEC' => 'dekada',
                'SECOND_PLURAL' => 'sekund',
                'MINUTE_PLURAL' => 'minut',
                'HOUR_PLURAL' => 'godzin',
                'DAY_PLURAL' => 'dni',
                'WEEK_PLURAL' => 'tygodnie',
                'MONTH_PLURAL' => 'miesięcy',
                'YEAR_PLURAL' => 'lat',
                'DECADE_PLURAL' => 'dekad',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'godz',
                'WK_PLURAL' => 'tyg',
                'MO_PLURAL' => 'm-ce',
                'YR_PLURAL' => 'lat',
                'DEC_PLURAL' => 'dekad'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Weryfikacja nie powiodła się:</b>',
                'INVALID_INPUT' => 'Nieprawidłowe dane wejściowe',
                'MISSING_REQUIRED_FIELD' => 'Opuszczono wymagane pole:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Styczeń',
                1 => 'Luty',
                2 => 'Marzec',
                3 => 'Kwiecień',
                4 => 'Maj',
                5 => 'Czerwiec',
                6 => 'Lipiec',
                7 => 'Sierpień',
                8 => 'Wrzesień',
                9 => 'Październik',
                10 => 'Listopad',
                11 => 'Grudzień'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Poniedziałek',
                1 => 'Wtorek',
                2 => 'Środa',
                3 => 'Czwartek',
                4 => 'Piątek',
                5 => 'Sobota',
                6 => 'Niedziela'
            ]
        ],
        'nl' => [
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Zoeken...',
                'SEARCH_RESULTS' => 'Zoek resultaat',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Query: <strong>%s</strong> is 1 keer gevonden',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Query: <strong>%s</strong> is %s keer gevonden'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'personen',
                'man' => 'mensen',
                'child' => 'kinderen',
                'sex' => 'geslacht',
                'move' => 'verplaatsen'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'geen datum opgegeven',
                'BAD_DATE' => 'Datumformaat onjuist',
                'AGO' => 'geleden',
                'FROM_NOW' => 'vanaf nu',
                'SECOND' => 'seconde',
                'MINUTE' => 'minuut',
                'HOUR' => 'uur',
                'DAY' => 'dag',
                'WEEK' => 'week',
                'MONTH' => 'maand',
                'YEAR' => 'jaar',
                'DECADE' => 'decenium',
                'SEC' => 's',
                'MIN' => 'min',
                'HR' => 'u',
                'MO' => 'ma',
                'YR' => 'j',
                'SECOND_PLURAL' => 'seconden',
                'MINUTE_PLURAL' => 'minuten',
                'HOUR_PLURAL' => 'uren',
                'DAY_PLURAL' => 'dagen',
                'WEEK_PLURAL' => 'weken',
                'MONTH_PLURAL' => 'maanden',
                'YEAR_PLURAL' => 'jaren',
                'DECADE_PLURAL' => 'decennia',
                'SEC_PLURAL' => 'seconden',
                'MIN_PLURAL' => 'minuten',
                'HR_PLURAL' => 'uren',
                'WK_PLURAL' => 'weken',
                'MO_PLURAL' => 'maanden',
                'YR_PLURAL' => 'jaren'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validatie mislukt:</b>',
                'INVALID_INPUT' => 'Ongeldige invoer in',
                'MISSING_REQUIRED_FIELD' => 'Verplicht veld ontbreekt:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Januari',
                1 => 'Februari',
                2 => 'Maart',
                3 => 'april',
                4 => 'Mei',
                5 => 'Juni',
                6 => 'Juli',
                7 => 'Augustus',
                8 => 'september',
                9 => 'Oktober',
                10 => 'november',
                11 => 'december'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Maandag',
                1 => 'Dinsdag',
                2 => 'Woensdag',
                3 => 'Donderdag',
                4 => 'Vrijdag',
                5 => 'Zaterdag',
                6 => 'Zondag'
            ]
        ],
        'es' => [
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Buscar...',
                'SEARCH_RESULTS' => 'Resultados de la búsqueda',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Consulta: <strong>%s</strong> se encontró 1 resultado',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Consulta: <strong>%s</strong> se encontraron %s resultados'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Error: Frontmatter Inválido

Ruta: `%2$s`

**%3$s**

```
%4$s
```
',
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'equipo',
                1 => 'información',
                3 => 'dinero',
                5 => 'series',
                6 => 'pescado',
                7 => 'oveja'
            ],
            'INFLECTOR_IRREGULAR' => [
                'man' => 'hombres',
                'child' => 'niños',
                'sex' => 'sexos'
            ],
            'INFLECTOR_ORDINALS' => [
                'first' => 'ro',
                'second' => 'do',
                'third' => 'ro'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'No se proporcionó fecha',
                'BAD_DATE' => 'Fecha erronea',
                'AGO' => 'antes',
                'FROM_NOW' => 'desde ahora',
                'SECOND' => 'segundo',
                'MINUTE' => 'minuto',
                'HOUR' => 'hora',
                'DAY' => 'día',
                'WEEK' => 'semana',
                'MONTH' => 'mes',
                'YEAR' => 'año',
                'DECADE' => 'década',
                'SEC' => 'seg',
                'MIN' => 'min',
                'HR' => 'h',
                'WK' => 'sem',
                'MO' => 'mes',
                'YR' => 'año',
                'DEC' => 'dec',
                'SECOND_PLURAL' => 'segundos',
                'MINUTE_PLURAL' => 'minutos',
                'HOUR_PLURAL' => 'horas',
                'DAY_PLURAL' => 'días',
                'WEEK_PLURAL' => 'semanas',
                'MONTH_PLURAL' => 'meses',
                'YEAR_PLURAL' => 'años',
                'DECADE_PLURAL' => 'décadas',
                'SEC_PLURAL' => 'segs',
                'MIN_PLURAL' => 'mins',
                'HR_PLURAL' => 'hs',
                'WK_PLURAL' => 'sem',
                'MO_PLURAL' => 'mes',
                'YR_PLURAL' => 'años',
                'DEC_PLURAL' => 'décadas'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Falló la validación. </b>',
                'INVALID_INPUT' => 'Dato inválido en: ',
                'MISSING_REQUIRED_FIELD' => 'Falta el campo requerido: '
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Enero',
                1 => 'Febrero',
                2 => 'Marzo',
                3 => 'Abril',
                4 => 'Mayo',
                5 => 'Junio',
                6 => 'Julio',
                7 => 'Agosto',
                8 => 'Septiembre',
                9 => 'Octubre',
                10 => 'Noviembre',
                11 => 'Diciembre'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Lunes',
                1 => 'Martes',
                2 => 'Miércoles',
                3 => 'Jueves',
                4 => 'Viernes',
                5 => 'Sábado',
                6 => 'Domingo'
            ]
        ],
        'ja' => [
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => '検索する...',
                'SEARCH_RESULTS' => '検索結果',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => '検索 : <strong>%s</strong> に一つの結果があります。',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => '検索 : <strong>%s</strong> に %s の結果があります。'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Error: Invalid Frontmatter

Path: `%2$s`

**%3$s**

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                
            ],
            'INFLECTOR_SINGULAR' => [
                
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'みんな',
                'man' => '人',
                'child' => '子供',
                'sex' => '性別',
                'move' => '移動'
            ],
            'INFLECTOR_ORDINALS' => [
                
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => '日付が設定されていません',
                'BAD_DATE' => '不正な日付',
                'AGO' => '前',
                'FROM_NOW' => 'from now',
                'SECOND' => '秒',
                'MINUTE' => '分',
                'HOUR' => '時',
                'DAY' => '日',
                'WEEK' => '週',
                'MONTH' => '月',
                'YEAR' => '年',
                'DECADE' => '10年',
                'SEC' => '秒',
                'MIN' => '分',
                'HR' => '時',
                'WK' => '週',
                'MO' => '月',
                'YR' => '年',
                'DEC' => 'dec',
                'SECOND_PLURAL' => '秒',
                'MINUTE_PLURAL' => '分',
                'HOUR_PLURAL' => '時',
                'DAY_PLURAL' => '日',
                'WEEK_PLURAL' => '週',
                'MONTH_PLURAL' => '月',
                'YEAR_PLURAL' => '年',
                'DECADE_PLURAL' => '10年',
                'SEC_PLURAL' => '秒',
                'MIN_PLURAL' => '分',
                'HR_PLURAL' => '時',
                'WK_PLURAL' => '週',
                'MO_PLURAL' => '月',
                'YR_PLURAL' => '年',
                'DEC_PLURAL' => '10年'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>バリデーション失敗 :</b>',
                'INVALID_INPUT' => '不正な入力：',
                'MISSING_REQUIRED_FIELD' => '必須項目が入力されていません:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => '1月',
                1 => '2月',
                2 => '3月',
                3 => '4月',
                4 => '5月',
                5 => '6月',
                6 => '7月',
                7 => '8月',
                8 => '9月',
                9 => '10月',
                10 => '11月',
                11 => '12月'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => '月',
                1 => '火',
                2 => '水',
                3 => '木',
                4 => '金',
                5 => '土',
                6 => '日'
            ]
        ],
        'fa' => [
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'جستجو...',
                'SEARCH_RESULTS' => 'نتایج جستجو',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'جستار: <strong>%s</strong> یک نتیجه یافت شد',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'جستار: <strong>%s</strong> %s نتیجه یافت شد'
            ]
        ],
        'pt' => [
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'O que você procura?',
                'SEARCH_RESULTS' => 'Resultados da pesquisa',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Pesquisa: <strong>%s</strong>. Foram encontrados 1 resultados',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Pesquisa: <strong>%s</strong>. Foram encontrados %s resultados'
            ],
            'FRONTMATTER_ERROR_PAGE' => '---
título: %1$s
---

# Erro: Frontmatter inválida

Caminho: `%2$s`

**%3$s**

```
%4$s
```
',
            'INFLECTOR_UNCOUNTABLE' => [
                1 => 'informação',
                2 => 'arroz',
                3 => 'dinheiro'
            ],
            'INFLECTOR_IRREGULAR' => [
                'man' => 'homens',
                'sex' => 'sexos'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Não foi fornecida data',
                'BAD_DATE' => 'Data inválida',
                'AGO' => 'atrás',
                'FROM_NOW' => 'a partir de agora',
                'SECOND' => 'segundo',
                'MINUTE' => 'minuto',
                'HOUR' => 'hora',
                'DAY' => 'dia',
                'WEEK' => 'semana',
                'MONTH' => 'mês',
                'YEAR' => 'ano',
                'DECADE' => 'década',
                'SEC' => 'seg',
                'MIN' => 'mín',
                'HR' => 'h',
                'WK' => 'sem',
                'MO' => 'm',
                'YR' => 'a',
                'DEC' => 'dec',
                'SECOND_PLURAL' => 'segundos',
                'MINUTE_PLURAL' => 'minutos',
                'HOUR_PLURAL' => 'horas',
                'DAY_PLURAL' => 'dias',
                'WEEK_PLURAL' => 'semanas',
                'MONTH_PLURAL' => 'meses',
                'YEAR_PLURAL' => 'anos',
                'DECADE_PLURAL' => 'décadas',
                'SEC_PLURAL' => 'seg',
                'MIN_PLURAL' => 'mins',
                'HR_PLURAL' => 'hrs',
                'WK_PLURAL' => 'sems',
                'YR_PLURAL' => 'anos'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validação falhada: </b>',
                'MISSING_REQUIRED_FIELD' => 'Campo obrigatório ausente:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Janeiro',
                1 => 'Fevereiro',
                2 => 'Março',
                3 => 'Abril',
                4 => 'Maio',
                5 => 'Junho',
                6 => 'Julho',
                7 => 'Agosto',
                8 => 'Setembro',
                9 => 'Outubro',
                10 => 'Novembro',
                11 => 'Dezembro'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Segunda',
                1 => 'Terça',
                2 => 'Quarta',
                3 => 'Quinta',
                4 => 'Sexta',
                5 => 'Sábado',
                6 => 'Domingo'
            ]
        ],
        'sv' => [
            'PLUGIN_SIMPLESEARCH' => [
                'SEARCH_PLACEHOLDER' => 'Sök...',
                'SEARCH_RESULTS' => 'Sökresultat',
                'SEARCH_RESULTS_SUMMARY_SINGULAR' => 'Sökning: <strong>%s</strong> hittade ett resultat',
                'SEARCH_RESULTS_SUMMARY_PLURAL' => 'Sökning: <strong>%s</strong> hittade %s resultat'
            ],
            'FRONTMATTER_ERROR_PAGE' => '--- titel: %1$s --- # Fel: Ogiltig Frontmatter-sökväg: `%2$s` **%3$s** ``` %4$s ```',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Inget datum har angivits',
                'BAD_DATE' => 'Ogiltigt datum',
                'AGO' => 'sedan',
                'FROM_NOW' => 'från nu',
                'SECOND' => 'sekund',
                'MINUTE' => 'minut',
                'HOUR' => 'timme',
                'DAY' => 'dag',
                'WEEK' => 'vecka',
                'MONTH' => 'månad',
                'YEAR' => 'år',
                'DECADE' => 'årtionde',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 't',
                'WK' => 'v',
                'MO' => 'm',
                'YR' => 'år',
                'DEC' => 'dec',
                'SECOND_PLURAL' => 'sekunder',
                'MINUTE_PLURAL' => 'minuter',
                'HOUR_PLURAL' => 'timmar',
                'DAY_PLURAL' => 'dagar',
                'WEEK_PLURAL' => 'veckor',
                'MONTH_PLURAL' => 'månader',
                'YEAR_PLURAL' => 'år',
                'DECADE_PLURAL' => 'årtionden',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 't',
                'WK_PLURAL' => 'v',
                'MO_PLURAL' => 'må',
                'YR_PLURAL' => 'år',
                'DEC_PLURAL' => 'dec'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Kontrollen misslyckades:</b>',
                'INVALID_INPUT' => 'Ogiltig indata i',
                'MISSING_REQUIRED_FIELD' => 'Obligatoriskt fält måste fyllas i:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Januari',
                1 => 'Februrari',
                2 => 'Mars',
                3 => 'April',
                4 => 'Maj',
                5 => 'Juni',
                6 => 'Juli',
                7 => 'Augusti',
                8 => 'September',
                9 => 'Oktober',
                10 => 'November',
                11 => 'December'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Måndag',
                1 => 'Tisdag',
                2 => 'Onsdag',
                3 => 'Torsdag',
                4 => 'Fredag',
                5 => 'Lördag',
                6 => 'Söndag'
            ]
        ],
        'ar' => [
            'FRONTMATTER_ERROR_PAGE' => '---
العنوان: %1$s
---
# خطأ: مادة أمامية غير صحيحة

مسار: \'%2$s\'

**%3$s**

, , ,

%4$s
, , ,
',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'لم يتم تقديم التاريخ',
                'BAD_DATE' => 'تاريخ خاطئ',
                'AGO' => 'من قبل',
                'FROM_NOW' => 'من الآن',
                'SECOND' => 'ثانية',
                'MINUTE' => 'دقيقة',
                'HOUR' => 'ساعة',
                'DAY' => 'يوم',
                'WEEK' => 'أسبوع',
                'MONTH' => 'شهر',
                'YEAR' => 'سنة',
                'DECADE' => 'عقد',
                'SEC' => 'ثانية',
                'MIN' => 'دقيقة',
                'HR' => 'ساعة',
                'WK' => 'أسبوع',
                'MO' => 'شهر',
                'YR' => 'سنة',
                'DEC' => 'عقد',
                'SECOND_PLURAL' => 'ثواني',
                'MINUTE_PLURAL' => '‮دقائق',
                'HOUR_PLURAL' => 'ساعات',
                'DAY_PLURAL' => 'أيام',
                'WEEK_PLURAL' => 'أسابيع',
                'MONTH_PLURAL' => 'أشهر',
                'YEAR_PLURAL' => 'سنوات',
                'DECADE_PLURAL' => 'عقود',
                'SEC_PLURAL' => 'ثواني',
                'MIN_PLURAL' => 'دقائق',
                'HR_PLURAL' => 'ساعات',
                'WK_PLURAL' => 'أسابيع',
                'MO_PLURAL' => 'أشهر',
                'YR_PLURAL' => 'سنوات',
                'DEC_PLURAL' => 'عقود'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>فشل التحقق من صحة:</b>',
                'INVALID_INPUT' => 'إدخال غير صحيح في',
                'MISSING_REQUIRED_FIELD' => 'حقل مطلوب مفقود:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'كانون الثاني',
                1 => 'شباط',
                2 => 'آذار/ مارس',
                3 => 'نيسان',
                4 => 'أيار',
                5 => 'حزيران',
                6 => 'تموز',
                7 => 'آب',
                8 => 'أيلول',
                9 => 'تشرين الأول',
                10 => 'تشرين الثاني',
                11 => 'كانون الأول'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'الاثنين',
                1 => 'الثلاثاء',
                2 => 'الأربعاء',
                3 => 'الخميس',
                4 => 'الجمعة',
                5 => 'السبت',
                6 => 'الأحد'
            ]
        ],
        'ca' => [
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# S\'ha produït un error: Frontmatter invàlid

Ruta: `%2$s`

**%3$s**

```
%4$s
```
',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'No s\'ha proporcionat data',
                'BAD_DATE' => 'Data invàlida',
                'AGO' => 'abans',
                'FROM_NOW' => 'des d\'ara',
                'SECOND' => 'segon',
                'MINUTE' => 'minut',
                'HOUR' => 'hora',
                'DAY' => 'dia',
                'WEEK' => 'setmana',
                'MONTH' => 'mes',
                'YEAR' => 'any',
                'DECADE' => 'dècada',
                'SEC' => 's',
                'MIN' => 'min',
                'HR' => 'h',
                'WK' => 'setm.',
                'MO' => 'm.',
                'YR' => 'a.',
                'DEC' => 'dèc.',
                'SECOND_PLURAL' => 'segons',
                'MINUTE_PLURAL' => 'minuts',
                'HOUR_PLURAL' => 'hores',
                'DAY_PLURAL' => 'dies',
                'WEEK_PLURAL' => 'setmanes',
                'MONTH_PLURAL' => 'mesos',
                'YEAR_PLURAL' => 'anys',
                'DECADE_PLURAL' => 'dècades',
                'SEC_PLURAL' => 's',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'h',
                'WK_PLURAL' => 'setm.',
                'MO_PLURAL' => 'mesos',
                'YR_PLURAL' => 'anys',
                'DEC_PLURAL' => 'dèc.'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Ha fallat la validació:</b>',
                'INVALID_INPUT' => 'Entrada no vàlida a',
                'MISSING_REQUIRED_FIELD' => 'Falta camp obligatori:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Gener',
                1 => 'Febrer',
                2 => 'Març',
                3 => 'Abril',
                4 => 'Maig',
                5 => 'Juny',
                6 => 'Juliol',
                7 => 'Agost',
                8 => 'Setembre',
                9 => 'Octubre',
                10 => 'Novembre',
                11 => 'Desembre'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Dilluns',
                1 => 'Dimarts',
                2 => 'Dimecres',
                3 => 'Dijous',
                4 => 'Divendres',
                5 => 'Dissabte',
                6 => 'Diumenge'
            ]
        ],
        'el' => [
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Ιανουάριος',
                1 => 'Φεβρουάριος',
                2 => 'Μάρτιος',
                3 => 'Απρίλιος',
                4 => 'Μάιος',
                5 => 'Ιούνιος',
                6 => 'Ιούλιος',
                7 => 'Αύγουστος',
                8 => 'Σεπτέμβριος',
                9 => 'Οκτώβριος',
                10 => 'Νοέμβριος',
                11 => 'Δεκέμβριος'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Δευτέρα',
                1 => 'Τρίτη',
                2 => 'Τετάρτη',
                3 => 'Πέμπτη',
                4 => 'Παρασκευή',
                5 => 'Σάββατο',
                6 => 'Κυριακή'
            ]
        ],
        'fi' => [
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Päivämäärää ei annettu',
                'BAD_DATE' => 'Virheellinen päivämäärä',
                'AGO' => 'sitten',
                'FROM_NOW' => 'tästä lähtien',
                'SECOND' => 'sekunti',
                'MINUTE' => 'minuutti',
                'HOUR' => 'tunti',
                'DAY' => 'päivä',
                'WEEK' => 'viikko',
                'MONTH' => 'kuukausi',
                'YEAR' => 'vuosi',
                'DECADE' => 'vuosikymmen',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 'h',
                'WK' => 'vk',
                'MO' => 'kk',
                'YR' => 'v',
                'DEC' => 'vuosikymmen',
                'SECOND_PLURAL' => 'sekuntia',
                'MINUTE_PLURAL' => 'minuuttia',
                'HOUR_PLURAL' => 'tuntia',
                'DAY_PLURAL' => 'päivää',
                'WEEK_PLURAL' => 'viikkoa',
                'MONTH_PLURAL' => 'kuukautta',
                'YEAR_PLURAL' => 'vuotta',
                'DECADE_PLURAL' => 'vuosikymmentä',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'h',
                'WK_PLURAL' => 'v',
                'MO_PLURAL' => 'kk',
                'YR_PLURAL' => 'v',
                'DEC_PLURAL' => 'vuosikymmentä'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Vahvistus epäonnistui:</b>',
                'MISSING_REQUIRED_FIELD' => 'Puuttuva pakollinen kenttä:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Tammikuu',
                1 => 'Helmikuu',
                2 => 'Maaliskuu',
                3 => 'Huhtikuu',
                4 => 'Toukokuu',
                5 => 'Kesäkuuta',
                6 => 'Heinäkuu',
                7 => 'Elokuu',
                8 => 'Syyskuu',
                9 => 'Lokakuu',
                10 => 'Marraskuu',
                11 => 'Joulukuu'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Maanantai',
                1 => 'Tiistai',
                2 => 'Keskiviikko',
                3 => 'Torstai',
                4 => 'Perjantai',
                5 => 'Lauantai',
                6 => 'Sunnuntai'
            ]
        ],
        'hu' => [
            'FRONTMATTER_ERROR_PAGE' => '---
cím: %1$s
---

# Hiba: Érvénytelen Frontmatter

Elérési út: `%2$s`

**%3$s**

```
%4$s
```
',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en',
                '/([m|l])ouse$/i' => '\\1ice',
                '/(matr|vert|ind)ix|ex$/i' => '\\1ices',
                '/(x|ch|ss|sh)$/i' => '\\1es',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([^aeiouy]|qu)y$/i' => '\\1ies',
                '/(hive)$/i' => '\\1s',
                '/(?:([^f])fe|([lr])f)$/i' => '\\1\\2ves',
                '/sis$/i' => 'ses',
                '/([ti])um$/i' => '\\1a',
                '/(buffal|tomat)o$/i' => '\\1oes',
                '/(bu)s$/i' => '\\1ses',
                '/(alias|status)/i' => '\\1es',
                '/(octop|vir)us$/i' => '\\1i',
                '/(ax|test)is$/i' => '\\1es',
                '/s$/i' => 's',
                '/$/' => 's'
            ],
            'INFLECTOR_SINGULAR' => [
                '/(quiz)zes$/i' => '\\1',
                '/(matr)ices$/i' => '\\1ix',
                '/(vert|ind)ices$/i' => '\\1ex',
                '/^(ox)en/i' => '\\1',
                '/(alias|status)es$/i' => '\\1',
                '/([octop|vir])i$/i' => '\\1us',
                '/(cris|ax|test)es$/i' => '\\1is',
                '/(shoe)s$/i' => '\\1',
                '/(o)es$/i' => '\\1',
                '/(bus)es$/i' => '\\1',
                '/([m|l])ice$/i' => '\\1ouse',
                '/(x|ch|ss|sh)es$/i' => '\\1',
                '/(m)ovies$/i' => '\\1ovie',
                '/(s)eries$/i' => '\\1eries',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([lr])ves$/i' => '\\1f',
                '/(tive)s$/i' => '\\1',
                '/(hive)s$/i' => '\\1',
                '/([^f])ves$/i' => '\\1fe',
                '/(^analy)ses$/i' => '\\1sis',
                '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2sis',
                '/([ti])a$/i' => '\\1um',
                '/(n)ews$/i' => '\\1ews'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'felszerelés',
                1 => 'információ',
                2 => 'rizs',
                3 => 'pénz',
                4 => 'fajok',
                5 => 'sorozat',
                6 => 'hal',
                7 => 'juh'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'személyek',
                'man' => 'férfiak',
                'child' => 'gyerekek',
                'sex' => 'nemek',
                'move' => 'lépések'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => '.',
                'first' => '.',
                'second' => '.',
                'third' => '.'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Nincs dátum megadva',
                'BAD_DATE' => 'Hibás dátum',
                'AGO' => 'elteltével',
                'FROM_NOW' => 'mostantól',
                'SECOND' => 'másodperc',
                'MINUTE' => 'perc',
                'HOUR' => 'óra',
                'DAY' => 'nap',
                'WEEK' => 'hét',
                'MONTH' => 'hónap',
                'YEAR' => 'év',
                'DECADE' => 'évtized',
                'SEC' => 'mp',
                'MIN' => 'p',
                'HR' => 'ó',
                'WK' => 'hét',
                'MO' => 'hó',
                'YR' => 'év',
                'DEC' => 'évt',
                'SECOND_PLURAL' => 'másodperc',
                'MINUTE_PLURAL' => 'perc',
                'HOUR_PLURAL' => 'óra',
                'DAY_PLURAL' => 'nap',
                'WEEK_PLURAL' => 'hét',
                'MONTH_PLURAL' => 'hónap',
                'YEAR_PLURAL' => 'év',
                'DECADE_PLURAL' => 'évtized',
                'SEC_PLURAL' => 'mp',
                'MIN_PLURAL' => 'perc',
                'HR_PLURAL' => 'ó',
                'WK_PLURAL' => 'hét',
                'MO_PLURAL' => 'hó',
                'YR_PLURAL' => 'év',
                'DEC_PLURAL' => 'évt'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>A validáció hibát talált:</b>',
                'INVALID_INPUT' => 'Az itt megadott érték érvénytelen:',
                'MISSING_REQUIRED_FIELD' => 'Ez a kötelező mező nincs kitöltve:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'január',
                1 => 'február',
                2 => 'március',
                3 => 'április',
                4 => 'május',
                5 => 'június',
                6 => 'július',
                7 => 'augusztus',
                8 => 'szeptember',
                9 => 'október',
                10 => 'november',
                11 => 'december'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'hétfő',
                1 => 'kedd',
                2 => 'szerda',
                3 => 'csütörtök',
                4 => 'péntek',
                5 => 'szombat',
                6 => 'vasárnap'
            ]
        ],
        'lt' => [
            'INFLECTOR_UNCOUNTABLE' => [
                2 => 'ryžiai',
                3 => 'pinigai',
                4 => 'prieskoniai',
                5 => 'serijos',
                6 => 'žuvis',
                7 => 'avis'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'žmonės',
                'man' => 'žmogus',
                'child' => 'vaikai',
                'sex' => 'lytys',
                'move' => 'juda'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Nenurodyta data',
                'BAD_DATE' => 'Neteisinga data',
                'AGO' => 'prieš',
                'FROM_NOW' => 'nuo dabar',
                'SECOND' => 'sekundė',
                'MINUTE' => 'minutė',
                'HOUR' => 'valanda',
                'DAY' => 'diena',
                'WEEK' => 'savaitė',
                'MONTH' => 'mėnuo',
                'YEAR' => 'metai',
                'DECADE' => 'dešimtmetis',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 'val',
                'WK' => 'sav',
                'MO' => 'mėn',
                'YR' => 'm',
                'MINUTE_PLURAL' => 'minutės',
                'HOUR_PLURAL' => 'valandos',
                'DAY_PLURAL' => 'dienos',
                'WEEK_PLURAL' => 'savaitės',
                'MONTH_PLURAL' => 'mėnesiai',
                'YEAR_PLURAL' => 'metai',
                'DECADE_PLURAL' => 'dešimtmečiai',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'val',
                'WK_PLURAL' => 'sav',
                'MO_PLURAL' => 'mėn',
                'YR_PLURAL' => 'm'
            ],
            'FORM' => [
                'MISSING_REQUIRED_FIELD' => 'Būtina užpildyti laukelį:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Sausis',
                1 => 'Vasaris',
                2 => 'Kovas',
                3 => 'Balandis',
                4 => 'Gegužė',
                5 => 'Birželis',
                6 => 'Liepa',
                7 => 'Rugpjūtis',
                8 => 'Rugsėjis',
                9 => 'Spalis',
                10 => 'Lakpritis',
                11 => 'Gruodis'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Pirmadienis',
                1 => 'Antradienis',
                2 => 'Trečiadienis',
                3 => 'Ketvirtadienis',
                4 => 'Penktadienis',
                5 => 'Šeštadienis',
                6 => 'Sekmadienis'
            ]
        ],
        'nb' => [
            'MONTHS_OF_THE_YEAR' => [
                0 => 'januar',
                1 => 'februar',
                2 => 'mars',
                3 => 'april',
                4 => 'mai',
                5 => 'juni',
                6 => 'juli',
                7 => 'august',
                8 => 'september',
                9 => 'oktober',
                10 => 'november',
                11 => 'desember'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'mandag',
                1 => 'tirsdag',
                2 => 'onsdag',
                3 => 'torsdag',
                4 => 'fredag',
                5 => 'lørdag',
                6 => 'søndag'
            ]
        ],
        'no' => [
            'FRONTMATTER_ERROR_PAGE' => '---
Tittel: %1$s
---

# Feilmelding: Ugyldig Frontmatter

Pane: \'%2$s\'

**%3$s **

```
%4$s
```
',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'utstyr',
                1 => 'informasjon',
                2 => 'ris',
                3 => 'penger',
                4 => 'arter',
                5 => 'serier',
                6 => 'fisk',
                7 => 'sau'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'folk',
                'man' => 'menn',
                'child' => 'barn',
                'sex' => 'kjønn',
                'move' => 'trekk'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Ingen dato gitt',
                'BAD_DATE' => 'Dårlig dato',
                'AGO' => 'siden',
                'FROM_NOW' => 'fra nå',
                'SECOND' => 'sekund',
                'MINUTE' => 'minutt',
                'HOUR' => 'time',
                'DAY' => 'dag',
                'WEEK' => 'uke',
                'MONTH' => 'måned',
                'YEAR' => 'år',
                'DECADE' => 'tiår',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 't',
                'WK' => 'uke',
                'MO' => 'må',
                'YR' => 'år',
                'DEC' => 'des',
                'SECOND_PLURAL' => 'sekunder',
                'MINUTE_PLURAL' => 'minutter',
                'HOUR_PLURAL' => 'timer',
                'DAY_PLURAL' => 'dager',
                'WEEK_PLURAL' => 'uker',
                'MONTH_PLURAL' => 'måneder',
                'YEAR_PLURAL' => 'år',
                'DECADE_PLURAL' => 'tiår',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'timer',
                'WK_PLURAL' => 'uker',
                'MO_PLURAL' => 'mdr',
                'YR_PLURAL' => 'år',
                'DEC_PLURAL' => 'årtier'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validering mislyktes:</b>',
                'INVALID_INPUT' => 'Ugyldig innhold i',
                'MISSING_REQUIRED_FIELD' => 'Mangler påkrevd felt:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'januar',
                1 => 'februar',
                2 => 'mars',
                3 => 'april',
                4 => 'mai',
                5 => 'juni',
                6 => 'juli',
                7 => 'august',
                8 => 'september',
                9 => 'oktober',
                10 => 'november',
                11 => 'desember'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'mandag',
                1 => 'tirsdag',
                2 => 'onsdag',
                3 => 'torsdag',
                4 => 'fredag',
                5 => 'lørdag',
                6 => 'søndag'
            ]
        ],
        'sk' => [
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Neposkytnutý žiaden dátum',
                'BAD_DATE' => 'Nesprávny dátum',
                'AGO' => 'pred',
                'FROM_NOW' => 'odteraz',
                'SECOND' => 'sekunda',
                'MINUTE' => 'minúta',
                'HOUR' => 'hodina',
                'DAY' => 'deň',
                'WEEK' => 'týždeň',
                'MONTH' => 'mesiac',
                'YEAR' => 'rok',
                'DECADE' => 'desaťročie',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 'hod'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Overenie zlyhalo:</b>',
                'INVALID_INPUT' => 'Neplatný vstup v',
                'MISSING_REQUIRED_FIELD' => 'Chýba vyžadované pole:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Január',
                1 => 'Február',
                2 => 'Marec',
                3 => 'Apríl',
                4 => 'Máj',
                5 => 'Jún',
                6 => 'Júl',
                7 => 'August',
                8 => 'September',
                9 => 'Október',
                10 => 'November',
                11 => 'December'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Pondelok',
                1 => 'Utorok',
                2 => 'Streda',
                3 => 'Štvrtok',
                4 => 'Piatok',
                5 => 'Sobota',
                6 => 'Nedeľa'
            ]
        ],
        'th' => [
            'FRONTMATTER_ERROR_PAGE' => '---
ชื่อเรื่อง: %1$s
---

# ข้อผิดพลาด: Invalid Frontmatter

Path: `%2$s`

**%3$s**

```
%4$s
```
',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'ไม่มีวันที่ให้',
                'BAD_DATE' => 'รูปแบบวันที่ผิด',
                'AGO' => 'ที่ผ่านมา',
                'FROM_NOW' => 'จากตอนนี้',
                'SECOND' => 'วินาที',
                'MINUTE' => 'นาที',
                'HOUR' => 'ชั่วโมง',
                'DAY' => 'วัน',
                'WEEK' => 'สัปดาห์',
                'MONTH' => 'เดือน',
                'YEAR' => 'ปี',
                'DECADE' => 'ทศวรรษที่ผ่านมา',
                'SEC' => 'วิ',
                'MIN' => 'นาที',
                'HR' => 'ชม.',
                'WK' => 'wk',
                'MO' => 'mo',
                'YR' => 'yr',
                'DEC' => 'dec',
                'SECOND_PLURAL' => 'วินาที',
                'MINUTE_PLURAL' => 'นาที',
                'HOUR_PLURAL' => 'ชั่วโมง',
                'DAY_PLURAL' => 'วัน',
                'WEEK_PLURAL' => 'สัปดาห์',
                'MONTH_PLURAL' => 'เดือน',
                'YEAR_PLURAL' => 'ปี',
                'DECADE_PLURAL' => 'ทศวรรษที่ผ่านมา',
                'SEC_PLURAL' => 'วินาที',
                'MIN_PLURAL' => 'นาที',
                'HR_PLURAL' => 'ชั่วโมง',
                'WK_PLURAL' => 'wks',
                'MO_PLURAL' => 'mos',
                'YR_PLURAL' => 'ปี',
                'DEC_PLURAL' => 'decs'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>ตรวจสอบล้มเหลว: </b>',
                'INVALID_INPUT' => 'ป้อนข้อมูลไม่ถูกต้องใน',
                'MISSING_REQUIRED_FIELD' => 'ขาดข้อมูลที่จำเป็น:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'มกราคม',
                1 => 'กุมภาพันธ์',
                2 => 'มีนาคม',
                3 => 'เมษายน',
                4 => 'พฤษภาคม',
                5 => 'มิถุนายน',
                6 => 'กรกฏาคม',
                7 => 'สิงหาคม',
                8 => 'กันยายน',
                9 => 'ตุลาคม',
                10 => 'พฤศจิกายน',
                11 => 'ธันวาคม'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'จันทร์',
                1 => 'อังคาร',
                2 => 'พุธ',
                3 => 'พฤหัสบดี',
                4 => 'ศุกร์',
                5 => 'เสาร์',
                6 => 'อาทิตย์'
            ]
        ],
        'tr' => [
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Tarih yok',
                'BAD_DATE' => 'Yanlış tarih',
                'AGO' => 'önce',
                'FROM_NOW' => '(şimdiden)',
                'SECOND' => 'saniye',
                'MINUTE' => 'dakika',
                'HOUR' => 'saat',
                'DAY' => 'gün',
                'WEEK' => 'hafta',
                'MONTH' => 'ay',
                'YEAR' => 'yıl',
                'DECADE' => 'onyıl',
                'SEC' => 'sn',
                'MIN' => 'dk',
                'HR' => 'sa',
                'WK' => 'hft',
                'MO' => 'ay',
                'YR' => 'yl',
                'DEC' => 'onyl',
                'SECOND_PLURAL' => 'saniye',
                'MINUTE_PLURAL' => 'dakika',
                'HOUR_PLURAL' => 'saat',
                'DAY_PLURAL' => 'gün',
                'WEEK_PLURAL' => 'hafta',
                'MONTH_PLURAL' => 'ay',
                'YEAR_PLURAL' => 'yıl',
                'DECADE_PLURAL' => 'onyıl',
                'SEC_PLURAL' => 'sn',
                'MIN_PLURAL' => 'dk',
                'HR_PLURAL' => 'sa',
                'WK_PLURAL' => 'hft',
                'MO_PLURAL' => 'ay',
                'YR_PLURAL' => 'yl',
                'DEC_PLURAL' => 'onyl'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Doğrulama başarısız:</b>'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Ocak',
                1 => 'Şubat',
                2 => 'Mart',
                3 => 'Nisan',
                4 => 'Mayıs',
                5 => 'Haziran',
                6 => 'Temmuz',
                7 => 'Ağustos',
                8 => 'Eylül',
                9 => 'Ekim',
                10 => 'Kasım',
                11 => 'Aralık'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Pazartesi',
                1 => 'Salı',
                2 => 'Çarşamba',
                3 => 'Perşembe',
                4 => 'Cuma',
                5 => 'Cumartesi',
                6 => 'Pazar'
            ]
        ],
        'uk' => [
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Помилка: Недопустимий вміст

Path: `%2$s`

**%3$s**

```
%4$s
```
',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Не вказана дата',
                'BAD_DATE' => 'Невірна дата',
                'AGO' => 'назад',
                'FROM_NOW' => 'відтепер',
                'SECOND' => 'секунда',
                'MINUTE' => 'хвилина',
                'HOUR' => 'година',
                'DAY' => 'день',
                'WEEK' => 'тиждень',
                'MONTH' => 'місяць',
                'YEAR' => 'рік',
                'DECADE' => 'десятиріччя',
                'SEC' => 'с',
                'MIN' => 'хв',
                'HR' => 'год',
                'WK' => 'тиж.',
                'MO' => 'міс.',
                'YR' => 'р.',
                'DEC' => 'рр.',
                'SECOND_PLURAL' => 'секунди',
                'MINUTE_PLURAL' => 'хвилини',
                'HOUR_PLURAL' => 'години',
                'DAY_PLURAL' => 'дні',
                'WEEK_PLURAL' => 'тижні',
                'MONTH_PLURAL' => 'місяці',
                'YEAR_PLURAL' => 'роки',
                'DECADE_PLURAL' => 'десятиріччя',
                'SEC_PLURAL' => 'с',
                'MIN_PLURAL' => 'хв',
                'HR_PLURAL' => 'год',
                'WK_PLURAL' => 'тиж.',
                'MO_PLURAL' => 'міс.',
                'YR_PLURAL' => 'рр.',
                'DEC_PLURAL' => 'рр.'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Перевірка не вдалася:</b>',
                'INVALID_INPUT' => 'Невірне введення в',
                'MISSING_REQUIRED_FIELD' => 'Відсутнє необхідне поле:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Січень',
                1 => 'Лютий',
                2 => 'Березень',
                3 => 'Квітень',
                4 => 'Травень',
                5 => 'Червень',
                6 => 'Липень',
                7 => 'Серпень',
                8 => 'Вересень',
                9 => 'Жовтень',
                10 => 'Листопад',
                11 => 'Грудень'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Понеділок',
                1 => 'Вівторок',
                2 => 'Середа',
                3 => 'Четвер',
                4 => 'П\'ятниця',
                5 => 'Субота',
                6 => 'Неділя'
            ]
        ],
        'vi' => [
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Error: Invalid Frontmatter

Path: `%2$s`

**%3$s**

```
%4$s
```
',
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Không có ngày được cung cấp',
                'BAD_DATE' => 'Ngày không hợp lệ',
                'AGO' => 'cách đây',
                'FROM_NOW' => 'từ bây giờ',
                'SECOND' => 'giây',
                'MINUTE' => 'phút',
                'HOUR' => 'giờ',
                'DAY' => 'ngày',
                'WEEK' => 'tuần',
                'MONTH' => 'tháng',
                'YEAR' => 'năm',
                'DECADE' => 'thập kỷ',
                'SEC' => 'giây',
                'MIN' => 'phút',
                'HR' => 'giờ',
                'WK' => 'tuần',
                'MO' => 'tháng',
                'YR' => 'năm',
                'DEC' => 'thập kỷ',
                'SECOND_PLURAL' => 'giây',
                'MINUTE_PLURAL' => 'phút',
                'HOUR_PLURAL' => 'giờ',
                'DAY_PLURAL' => 'ngày',
                'WEEK_PLURAL' => 'tuần',
                'MONTH_PLURAL' => 'tháng',
                'YEAR_PLURAL' => 'năm',
                'DECADE_PLURAL' => 'thập kỷ',
                'SEC_PLURAL' => 'giây',
                'MIN_PLURAL' => 'phút',
                'HR_PLURAL' => 'giờ',
                'WK_PLURAL' => 'tuần',
                'MO_PLURAL' => 'tháng',
                'YR_PLURAL' => 'năm',
                'DEC_PLURAL' => 'thập kỷ'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Xác nhận thất bại:</b>',
                'INVALID_INPUT' => 'Dữ liệu nhập không hợp lệ cho',
                'MISSING_REQUIRED_FIELD' => 'Thiếu trường bắt buộc:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Tháng 1',
                1 => 'Tháng 2',
                2 => 'Tháng 3',
                3 => 'Tháng 4',
                4 => 'Tháng 5',
                5 => 'Tháng 6',
                6 => 'Tháng 7',
                7 => 'Tháng 8',
                8 => 'Tháng 9',
                9 => 'Tháng 10',
                10 => 'Tháng Mười 11',
                11 => 'Tháng 12'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Thứ 2',
                1 => 'Thứ 3',
                2 => 'Thứ 4',
                3 => 'Thứ 5',
                4 => 'Thứ 6',
                5 => 'Thứ 7',
                6 => 'Chủ Nhật'
            ]
        ],
        'checksum' => '3267df56fd0849de3003a7e011d294d3',
        'timestamp' => 1504843878
    ]
];
