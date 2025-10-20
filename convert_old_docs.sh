#!/bin/bash

# Korenski folder projekta (gde se skripta pokreće)
BASE_DIR="$(pwd)"
INPUT_DIR="$BASE_DIR/storage/app/private/nalazi"
OUTPUT_DIR="$INPUT_DIR/docx"

mkdir -p "$OUTPUT_DIR"

# Datum granice: 1.1.2015
DATE_CUTOFF=$(date -j -f "%Y-%m-%d" "2015-01-01" "+%s")

# Start LibreOffice u headless režimu kao daemon
soffice --headless --nologo --nodefault --norestore --invisible &

SOFFICE_PID=$!

# Funkcija za ubijanje soffice procesa na kraju
cleanup() {
    kill $SOFFICE_PID 2>/dev/null
}
trap cleanup EXIT

# Prolazak kroz sve .doc fajlove
find "$INPUT_DIR" -type f -name "*.doc" -print0 | while IFS= read -r -d '' file; do
    FILE_TIME=$(stat -f "%m" "$file")
    OUTPUT_FILE="$OUTPUT_DIR/$(basename "${file%.doc}.docx")"

    # Preskoči ako je već konvertovan ili je nakon DATE_CUTOFF
    if [ "$FILE_TIME" -ge "$DATE_CUTOFF" ] || [ -f "$OUTPUT_FILE" ]; then
        echo "Preskačem: $file"
        continue
    fi

    echo "Konvertujem: $file"
    soffice --headless --convert-to docx "$file" --outdir "$OUTPUT_DIR"
done

echo "Konverzija završena. Svi stari .doc fajlovi su u $OUTPUT_DIR"
