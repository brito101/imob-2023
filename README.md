# Imob Project with Laravel 10 + Docker + Telescope + Debugar + AdminLTE3 + DataTables server side + Spatie ACL

## Resources

- User controller
- Agency controller with brokers
- Client controller with timeline
- Visitors log

## Usage

1. `cp .env.example .env`
2. Edit .env parameters
3. `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`
4. `sail composer install`
5. `sail artisan key:generate`
6. `sail artisan storage:link`
7. `sail artisan migrate --seed`
8. `npm install && npm run dev`
9. `sail stop`

- `docker-compose exec laravel.test bash`

### Programmer login

- user: <programador@base.com>
- pass: 12345678
