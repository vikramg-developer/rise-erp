echo "⚙️  Running all migrations..."
php spark migrate --all
php spark db:seed AddAbbrivationData


echo "✅ Database migration and seeding complete!"

