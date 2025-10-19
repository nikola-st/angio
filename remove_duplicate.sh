#!/bin/bash

DOCX_DIR="/Users/nikola/Herd/angio/storage/app/private/nalazi/docx"
DOC_DIR="/Users/nikola/Herd/angio/storage/app/private/nalazi"

echo "1) Brisanje duplikata u docx folderu..."

# Nađi duplikate po imenu (zadrži prvi) i obriši ostale
find "$DOCX_DIR" -type f -name "*.docx" -print0 | \
    awk -v RS='\0' '{n=split($0,a,"/"); name=a[n]; if(seen[name]++) print $0}' | \
    xargs -0 -I{} rm -v "{}"

echo "2) Brisanje doc fajlova koji imaju docx ekvivalent..."

# Nađi sve .doc fajlove
find "$DOC_DIR" -type f -name "*.doc" -print0 | while IFS= read -r -d '' docfile; do
    base=$(basename "$docfile" .doc)
    if find "$DOCX_DIR" -maxdepth 1 -type f -name "$base.docx" | grep -q .; then
        echo "Brišem: $docfile"
        rm -v "$docfile"
    fi
done

echo "Čišćenje završeno."
