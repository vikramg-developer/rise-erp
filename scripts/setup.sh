echo "⚙️  Running all migrations..."
php spark migrate --all
php spark db:seed AddAbbrivationData
php spark db:seed AddAcademicYear
echo "✅ Database migration and seeding complete!"

