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

It's a challenge to build "anemic" domain model with Active record pattern used by laravel. You have to apply rules and be strict
about following them to not "leak" implementation to laravel factory methods etc. It's also not possible to use all laravel
built-in features. However, it's worth investing in keeping your domain logic in one place and not have it in multiple files
(controllers, models, services etc.)

Files namespace: app/Core/FormEloquent

**CQRS**

Jobs (Command) to create, update, delete objects 

- Every change in db should be represented by a Command
- Always keep jobs simple and pass primitives (no Eloquent objects!). For batch jobs use an array of DTO's
- Jobs are a great way to show what your app is doing (it's kind of a map of your application actions if implemented 
correctly which can also serve as a documentation
- [CreateFormEloquentJob.php](app/Core/FormEloquent/Jobs/CreateFormEloquentJob.php)
- [CreateFormEloquentJobHandler.php](app/Core/FormEloquent/Jobs/CreateFormEloquentJobHandler.php)
- Mapping in [JobServiceProvider.php](app/Providers/JobServiceProvider.php)

Query to retrieve data from DB

- Reads are expensive operations
- Depends on the context you might need different data (Admin, User, CustomerSupport)
- Simple DTO's to pass data from Query to UserInterface
- Simple queries (no Active Record or ORM)
- With proper inversion of control some part of the application can use DB and Elastic just by replacing 
implementation of an interface
- Performance comparison: [Eloquent vs DB](https://devsenv.com/tutorials/laravel-eloquent-vs-db-query-builder-performance-and-other-statistics) 

Domain

- Eloquent domain object example [FormEloquent.php](app/Core/FormEloquent/FormEloquent.php)

Tests

- Unit [FormEloquentTest.php](tests/Unit/Core/FormEloquent/FormEloquentTest.php)


### Laravel Doctrine

- TODO: add description

