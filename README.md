## Laravel DDD (Domain Driven Design) real world examples

Purpose of this repository is to show how DDD concepts can be applied using Laravel framework, 
currently repo contains two examples of Eloquent and Doctrine approaches

### Concept

"Domain-Driven Design is an approach to software development that centers the development on programming a domain model that has a rich understanding of the processes and rules of a domain. The name comes from a 2003 book by Eric Evans that describes the approach through a catalog of patterns. Since then a community of practitioners have further developed the ideas, spawning various other books and training courses. The approach is particularly suited to complex domains, where a lot of often-messy logic needs to be organized."

Martin Fowler

### Useful links

- https://martinfowler.com/tags/domain%20driven%20design.html
- https://matthiasnoback.nl/tags/Domain-Driven%20Design/

### Laravel Eloquent

- app/Core/FormEloquent

CQRS

- Jobs (Command) to create, update, delete objects [CreateFormJob.php](app/Core/FormEloquent/Jobs/CreateFormJob.php)
- Query to retrieve data from DB

Domain

- Eloquent domain object example [FormEloquent.php](app/Core/FormEloquent/FormEloquent.php)

Tests

- Unit [FormEloquentTest.php](test/)


### Laravel Doctrine

- TODO: add description

