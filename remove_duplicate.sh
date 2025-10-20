#!/bin/bash

# Korenski folder projekta (gde se skripta pokreće)
BASE_DIR="$(pwd)"
DOC_DIR="$BASE_DIR/storage/app/private/nalazi"
DOCX_DIR="$DOC_DIR/docx"

echo "Brišem .doc fajlove koji imaju .docx ekvivalent u folderu 'docx'..."

find "$DOC_DIR" -maxdepth 1 -type f -name "*.doc" -print0 | while IFS= read -r -d '' docfile; do
    base=$(basename "$docfile" .doc)
    if [ -f "$DOCX_DIR/$base.docx" ]; then
        echo "Brišem: $docfile"
        rm -v "$docfile"
    fi
done

echo "Gotovo. Svi .doc fajlovi koji imaju .docx ekvivalent su obrisani."

echo "Premeštam sve .docx fajlove iz podfoldera 'docx' u glavni folder..."
mv -n "$DOCX_DIR"/*.docx "$DOC_DIR"/

echo "Premeštanje završeno."
