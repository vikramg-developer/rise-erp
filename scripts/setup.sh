echo "⚙️  Running all migrations..."
php spark migrate --all
php spark db:seed AddAbbreviationData
php spark db:seed AddAcademicYear
php spark db:seed AddFacultyRegistrationMaster
php spark db:seed AddFinancialYear
php spark db:seed AddReligion
php spark db:seed AddSemester
php spark db:seed AddCaste
php spark db:seed AddCategory
php spark db:seed AddSubjectType
php spark db:seed AddFacultyType
echo "✅ Database migration and seeding complete!"
