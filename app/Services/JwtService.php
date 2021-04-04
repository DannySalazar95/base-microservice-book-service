<?php


namespace App\Services;


use App\Exceptions\JwtNoExistsException;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use Lcobucci\JWT\Signer\Key;

class JwtService
{
    protected $jwt;
    protected $payload;

    /**
     * @param Request $request
     * @return string|null
     * @throws JwtNoExistsException
     */
    public static function getJwtInRequest (Request $request): ?string
    {
        if (!$request->hasHeader(config('jwt.header_name'))) {
            throw new JwtNoExistsException();
        }
        return $request->header(config('jwt.header_name'));
    }

    /**
     * @param Request $request
     * @return $this
     * @throws JwtNoExistsException}
     */
    public function decodeFromRequest(Request $request): JwtService
    {
        $jwt = self::getJwtInRequest($request);
        return $this->decode($jwt);
    }

    /**
     * @param string $jwt
     * @return JwtService
     */
    public function decode(string $jwt): JwtService
    {
        $this->payload = JWT::decode(
            $jwt,
            $this->getKeyContent('jwt-public.key'),
            ['RS256']
        );

        return $this;
    }

    /**
     * @return object
     */
    public function getPayload(): object
    {
        return $this->payload;
    }

    /**
     * @return string
     */
    public function getJwt(): string
    {
        return $this->jwt;
    }

    /**
     * @param $file
     * @return string
     */
    private function getKeyContent($file): string
    {
        $prefix = 'file://';
        return $prefix.(new Key(Passport::keyPath($file)))->contents();
    }

}